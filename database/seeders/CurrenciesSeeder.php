<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Currencies;


class CurrenciesSeeder extends Seeder
{
    public function run()
    {
        // Insérer des données dans la table 'currencies'
        Currencies::create(['name' => 'USD']);
        Currencies::create(['name' => 'EUR']);
        Currencies::create(['name' => 'GBP']);

        // Insérer des données dans la table 'pair'
        DB::table('pair')->insert([
            [
                'name' => 'USD to EUR',
                'from' => 1, // ID de 'USD' dans la table 'currencies'
                'to' => 2,   // ID de 'EUR' dans la table 'currencies'
                'value' => 0.85,
            ],
            [
                'name' => 'USD to GBP',
                'from' => 1,
                'to' => 3,  
                'value' => 0.78,
            ],
            [
                'name' => 'EUR to USD',
                'from' => 2,
                'to' => 1,
                'value' => 1.11,
            ],
            [
                'name' => 'EUR to GBP',
                'from' => 2,
                'to' => 3,  
                'value' => 0.87,
            ],
            [
                'name' => 'GPB to USD',
                'from' => 3,
                'to' => 1,  
                'value' => 1.28,
            ],
            [
                'name' => 'GPB to EUR',
                'from' => 3,
                'to' => 2,  
                'value' => 1.15,
            ],
        ]);
    }
}