<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Cheia și ID-ul merchantului de la EuPlatesc (ar trebui să fie configurate din .env)
    private $mid = "44840986050";
    private $key = "4F335629860767F4364F96F47ADF485BB75F0D58"; // Ar trebui stocată într-un loc sigur, ex: .env

    public function securePayment(Request $request)
{
    // Găsim comanda în baza de date după GUID
    $order = Order::where('guid', $request->input('guid'))->firstOrFail();

    // Obținem datele de facturare din `company_information`
    $companyInfo = json_decode($order->company_information, true);

    // Verificăm tipul de facturare (0 pentru persoană fizică, 1 pentru persoană juridică)
    if ($order->billing_type == 0) { // Persoană fizică
        $firstName = $companyInfo['person_first_name'];
        $lastName = $companyInfo['person_last_name'];
        $email = $companyInfo['person_email'];
    } elseif ($order->billing_type == 1) { // Persoană juridică
        $firstName = $companyInfo['contact_person_first_name'];
        $lastName = $companyInfo['contact_person_last_name'];
        $email = $companyInfo['organization_email'];
    }

    // Eliminăm validările suplimentare, datele sunt preluate direct din DB
    $ep_order = substr(md5(mt_rand() . mt_rand() . mt_rand() . mt_rand()), 0, 18);

    // Denumirea companiei sau persoanei fizice
    $string = $firstName . ' - ' . $lastName;

    // Datele pentru procesatorul de plăți EuPlatesc
    $dataAll = [
        'amount' => number_format((float) $request->input('amount'), 2, '.', ''),
        'curr' => 'RON',
        'invoice_id' => $ep_order,
        'order_desc' => 'Plata factura - ' . $string . ' / ' . $request->input('orderNo'),
        'merch_id' => $this->mid,
        'timestamp' => gmdate("YmdHis"),
        'nonce' => md5(microtime() . mt_rand()),
    ];

    // Generăm hash-ul pentru semnătură
    $dataAll['fp_hash'] = strtoupper($this->euplatesc_mac($dataAll, $this->key));
    $dataAll['email'] = $email;
    $dataAll['fname'] = $firstName;
    $dataAll['lname'] = $lastName;

    if ($order->billing_type == 1) { // Dacă este persoană juridică, adăugăm și numele companiei
        $dataAll['company'] = $companyInfo['organization_name'];
    }

    // dd($dataAll);

    // Obținem produsele comandate (logica specifică a proiectului tău)
    $orderedProducts = $this->getOrderedProducts($order);

    // Redirecționăm către pagina securizată de plată
    return view('products.secure-payment', ['dataAll' => $dataAll, 'ordered_products' => $orderedProducts, 'order' => $order]);
}


    // Funcție pentru validarea câmpurilor de plată
    private function validatePayment($data)
    {
        $errors = [];
        if (empty($data['first_name'])) {
            $errors['error_first_name'] = 'Prenumele este obligatoriu';
        }
        if (empty($data['last_name'])) {
            $errors['error_last_name'] = 'Numele este obligatoriu';
        }
        if (empty($data['email'])) {
            $errors['error_email'] = 'Email-ul este obligatoriu';
        }
        if (empty($data['orderNo'])) {
            $errors['error_order'] = 'Numărul comenzii este obligatoriu';
        }
        if (empty($data['amount'])) {
            $errors['error_amount'] = 'Suma este obligatorie';
        }
        return $errors;
    }

    // Funcția pentru a genera semnătura HMAC-SHA1
    private function euplatesc_mac($data, $key)
    {
        $str = NULL;
        foreach ($data as $d) {
            if ($d === NULL || strlen($d) == 0) {
                $str .= '-';
            } else {
                $str .= strlen($d) . $d;
            }
        }
        $key = pack('H*', $key);
        return hash_hmac('sha1', $str, $key);
    }

    private function getOrderedProducts($order)
    {
        return $order->productVariations()->withPivot('quantity', 'price', 'price_no_vat')->get();
    }
}
