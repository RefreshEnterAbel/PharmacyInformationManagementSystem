<?php

namespace Database\Seeders;

use App\Models\MedicineTypes;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MedicineTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $types = [
            'Anti Diabetics',
            'Dermatologic Agent',
            'Antihelminthic',
            'Gastrointestinal',
            'Antifungals',
            'Cardio-Vascular',
            'Anti Bacterial ',
            'Central (CNS)',
            'Anti-Biotics',
            'Anti-Allergy',
            'Eye,Ear Ear perforation',
            'Vitamins and minerals'
        ];

        foreach ($types as $type) {
            if (MedicineTypes::where('name', $type)->first() == null) {
                MedicineTypes::with('')->create([
                    'name' => $type,
                    'description' => $faker->text('200')
                ]);
            }
        }
    }
}
