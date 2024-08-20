@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/anagajari.css') }}">
@endsection

@section('content')

<style>
    #header_img_bg {
        background-image: url('{{ asset('resources/Angajari-Romtehnochim.jpg') }}');
    }
</style>

<div class="angajari relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg">
        <h1 class="z-10" id="angajari_header">
            Emex by Romtehnochim <br>
            Te invita alaturi de noi
        </h1>
    </div>
</div>

<div class="main-container col">
    <h3>Formular de aplicare Emex</h3>
    <p>
        Daca sunteti interesat sa faceti parte din echipa ROMTEHNOCHIM completati mai jos datele dumneavoastra. Trimiteti-va CV-ul, iar noi vom legatura cu dumneavoastra in cel mai scurt timp. Pentru mai multe informatii, puteti sa si sunati la: 0724-509.552
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="mt-64" method="POST" action="{{ url('/angajari') }}" enctype="multipart/form-data" id="angajari_wrapper">
        @csrf
        <div class="grid grid-3 gap-md">
            <div class="form-group">
                <label>Nume</label>
                <input class="w-full" type="text" class="form-control" placeholder="Nume..." name="Angajari[name]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Data Nasterii</label>
                <input class="w-full" type="date" class="form-control" placeholder="Data Nasterii..." name="Angajari[date_of_birth]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Adresa</label>
                <input class="w-full" type="text" class="form-control" placeholder="Adresa..." name="Angajari[address]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Cod Postal</label>
                <input class="w-full" type="text" class="form-control" placeholder="Cod Postal..." name="Angajari[postal_code]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="w-full" type="email" class="form-control" placeholder="Email..." name="Angajari[email]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Sex</label>
                <select class="w-full" name="Angajari[gender]" aria-required="true" required="required">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
            </div>
        </div>
        <div class="grid grid-2 gap-md mt-16">
            <div class="form-group">
                <label>Oras</label>
                <input class="w-full" type="text" class="form-control" placeholder="Oras..." name="Angajari[city]" aria-required="true" required="required">
            </div>

            <div class="form-group">
                <label>CV</label>
                <input class="w-full" type="file" class="form-control" placeholder="CV..." name="Angajari[upload]" aria-required="true" required="required">
            </div>
        </div>
        <div class="form-group mt-32">
            <label>Mesaj</label>
            <textarea class="w-full" id="apm" placeholder="Mesaj..." name="Angajari[message]" rows="10" aria-required="true" required="required"></textarea>
        </div>

        <div class="row justify-center mt-32">
            <input type="submit" value="Trimite" id="aps_btn" class="btn btn-blue">
        </div>
    </form>
</div>

@endsection
