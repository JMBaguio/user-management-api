<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  $barangays = [
            'Adlaon', 'Agsungot', 'Apas', 'Babag', 'Bacayan',
            'Banilad', 'Basak Pardo', 'Basak San Nicolas', 'Binaliw', 'Bonbon',
            'Budlaan', 'Buhisan', 'Bulacao', 'Busay', 'Calamba',
            'Cambinocot', 'Capitol Site', 'Carreta', 'Cogon Pardo', 'Cogon Ramos',
            'Day-as', 'Duljo Fatima', 'Ermita', 'Guadalupe', 'Guba',
            'Hipodromo', 'Inayawan', 'Kalubihan', 'Kamagayan', 'Kamputhaw',
            'Kasambagan', 'Kinasang-an Pardo', 'Labangon', 'Lahug', 'Lorega San Miguel',
            'Lusaran', 'Luz', 'Mabini', 'Mabolo', 'Malubog',
            'Mambaling', 'Pahina Central', 'Pahina San Nicolas', 'Pamutan', 'Pari-an',
            'Paril', 'Pasil', 'Pit-os', 'Pulangbato', 'Pung-ol Sibugay',
            'Quiot Pardo', 'Sambag I', 'Sambag II', 'San Antonio', 'San Jose',
            'San Nicolas Proper', 'San Roque', 'Santa Cruz', 'Sapangdaku', 'Sawang Calero',
            'Sinsin', 'Sirao', 'Suba', 'Sudlon I', 'Sudlon II',
            'T. Padilla', 'Tabunan', 'Tagbao', 'Talamban', 'Taptap',
            'Tejero', 'Tinago', 'Tisa', 'To-ong', 'Zapatera',
        ];
        foreach ($barangays as $barangay) {
                    DB::table('barangays')->insert([
                        'name' => $barangay,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
    }
}
