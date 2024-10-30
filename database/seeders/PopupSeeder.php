<?php

namespace Database\Seeders;

use App\Models\Popup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Popup::firstOrCreate([
            'message' => 'Datorita numarului mare de solicitari din aceasta perioada, timpul de productie va fi de cca. <em><strong>4 zile lucratoare</strong></em> de la lansarea comenzii ferme, dupa care produsele se vor ridica de catre curier.<br> Ne cerem scuze pentru inconvenient si va multumim pentru intelegere !',
            'slug' => 'produse-adaugate',
            'is_active' => 0,
        ]);

        Popup::firstOrCreate([
            'message' => 'Comenzile se preiau doar prin intermediul formularului de comanda sau pe mail.<br><strong class="mark"><em>Comenzile nu se pot prelua telefonic !</em></strong><p style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 24px; color: #900; margin-top: 0px; margin-bottom: 10px; margin-left: 0px; text-align: left;"><br><strong>Va multumim pentru intelegere !</strong></p>',
            'slug' => 'contact',
            'is_active' => 1,
        ]);

        Popup::firstOrCreate([
            'message' => 'Va informam ca activitatea va fi reluata incepand cu data de <span style="background-color: #ddfde8;"><strong style="color:blue"><em>08 Ianuarie 2024</em></strong></span>. Comenzile primite in aceasta perioada vor fi onorate dupa aceasta data, la care comanda va fi considerata ca primita.<br /><br /> <p style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 24px; color: #900; margin-top: 0px; margin-bottom: 10px; margin-left: 0px; text-align: left;"><strong>Va multumim !</strong></p>',
            'slug' => 'produse-adaugate',
            'is_active' => 0,
        ]);

        Popup::firstOrCreate([
            'message' => 'Va informam ca activitatea va fi reluata incepand cu data de <span style="background-color: #ddfde8;"><strong style="color:blue"><em>07 Mai 2024</em></strong></span>. Comenzile primite in aceasta perioada vor fi onorate dupa aceasta data, la care comanda va fi considerata ca primita.<br /><br /><p style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 24px; color: #900; margin-top: 0px; margin-bottom: 10px; margin-left: 0px; text-align: left;"><strong>Va multumim !</strong></p>',
            'slug' => 'produse-adaugate',
            'is_active' => 0,
        ]);

        Popup::firstOrCreate([
            'message' => 'Va informam ca, intrucat zilele de 01 Iunie 2023 si 05 Iunie 2023, de Sarbatoarea Rusaliilor, vor fi libere, comenzile primite in aceasta perioada vor putea fi onorate doar incepand de <span style="background-color: #ddfde8;"><strong style="color:blue"><em>Marti 06 Iunie 2023</em></strong></span>, data la care comanda va fi considerata ca primita.<br /><br /> <p style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 24px; color: #900; margin-top: 0px; margin-bottom: 10px; margin-left: 0px; text-align: left;"><strong>Va multumim !</strong></p>',
            'slug' => 'produse-adaugate',
            'is_active' => 0,
        ]);
    }
}
