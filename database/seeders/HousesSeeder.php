<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\House;

class HousesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $path = storage_path('app/property-data.csv');

        if (($handle = fopen($path, "r")) !== FALSE) {
            fgetcsv($handle); // skip header
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                House::create([
                    'name' => $row[0],
                    'price' => $row[1],
                    'bedrooms' => $row[2],
                    'bathrooms' => $row[3],
                    'storeys' => $row[4],
                    'garages' => $row[5],
                ]);
            }
            fclose($handle);
        }
    }
}
