<?php

namespace App\Imports;

use App\Models\MeasurementUnit;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductVariationImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        $longName = $row['denumire_produs'];

        //Culoare
        if ($row['culoare']) {
            $longName .= ' - ' . $row['culoare'];
        }

        //Ambalaj
        if ($row['cantitate']) {
            $longName .= ' - Bid. ' . $row['cantitate'];
        }

        //Intaritor
        if ($row['text_intaritor']) {
            $longName .= ' ' . $row['text_intaritor'];
        }

        $quantityParts = explode(' ', $row['cantitate']);
        $measurementUnitString = $quantityParts[1];
        $quantity = $quantityParts[0];
        $measurementUnit = MeasurementUnit::where('name', $measurementUnitString)->first();

        $ean = $row['cod_ean'];
        $productVariation = ProductVariation::where('ean', $ean)->first();

        if ($measurementUnit) {
            if ($productVariation) {
                $productVariation->update([
                    'short_name' => $row['denumire_produs'],
                    'name' => $longName,
                    'price' => $row['pret_total_cu_tva'],
                    'addon_text' => $row['text_intaritor'],
                    'sku' => $row['cod_sku'],
                    'weight' => $row['cant_tot_kg'],
                    'colour' => $row['culoare'],
                    'quantity' => $quantity,
                    'measurement_unit_id' => $measurementUnit->id,
                ]);
            } else {
                $product = Product::where('slug', $row['link'])->first();

                if ($product) {
                    ProductVariation::create([
                        'product_id' => $product->id,
                        'ean' => $row['cod_ean'],
                        'short_name' => $row['denumire_produs'],
                        'name' => $longName,
                        'price' => $row['pret_total_cu_tva'],
                        'addon_text' => $row['text_intaritor'],
                        'sku' => $row['cod_sku'],
                        'weight' => $row['cant_tot_kg'],
                        'colour' => $row['culoare'],
                        'quantity' => $quantity,
                        'measurement_unit_id' => $measurementUnit->id,
                    ]);
                }
            }
        }
    }
}
