<?php

namespace Database\Seeders;

use App\Models\Medicines;
use Illuminate\Database\Seeder;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $medicines = [
            [
                "type_id" => 12,
                "name" => "prenatal",
                "generic_name" => "prenatal multivitamin",
                "med_company" => "Acella Pharmaceuticals, LLC",
                "exp_date" => "2022-05-03",
                "manufacture_date" => "2017-02-07",
                "price" => 200.0,
                "no_items" => "30",
                "dose_amount" => "10mg",
                "shelf_no" => "PIS-01",
                "prescription" => "Folic acid, especially in doses over 0.1 mg daily, may obscure pernicious anemia associated with vitamin B12 deficiency in that hematologic remission may occur while neurological manifestations remain progressive. Folic acid may lower the serum concentration of phenytoin resulting in increased seizure frequency. Consumption of greater than 3 grams per day of omega-3 fatty acids such as DHA exceeding 2 grams per day is not recommended.",
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 8,
                "name" => "diclofenac",
                "generic_name" => "diclofenac",
                "med_company" => "ASTRA-IDL",
                "exp_date" => "2023-03-15",
                "manufacture_date" => "2020-10-05",
                "price" => 300.0,
                "no_items" => "15",
                "dose_amount" => "500ml",
                "shelf_no" => "pIS-03",
                "prescription" => null,
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 6,
                "name" => "Atenolol",
                "generic_name" => "Tenormin",
                "med_company" => "Teva",
                "exp_date" => "2023-05-29",
                "manufacture_date" => "2019-12-04",
                "price" => 250.0,
                "no_items" => "12",
                "dose_amount" => "50mg",
                "shelf_no" => "PSI-06",
                "prescription" => null,
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 9,
                "name" => "Amoxicillin 500mg",
                "generic_name" => "amoxicillin",
                "med_company" => "Shalina laboratories  pvt.ltd",
                "exp_date" => "2021-09-17",
                "manufacture_date" => "2021-09-17",
                "price" => 50.0,
                "no_items" => "55",
                "dose_amount" => "100mg",
                "shelf_no" => "PIS-02",
                "prescription" => null,
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 2,
                "name" => "ketoconazole cream",
                "generic_name" => "Nizoral",
                "med_company" => "TARO",
                "exp_date" => "2025-05-24",
                "manufacture_date" => "2021-11-10",
                "price" => 5.0,
                "no_items" => "50",
                "dose_amount" => "200-400 mg",
                "shelf_no" => "pIS-08",
                "prescription" => null,
                "categories" => "Pharmacy Medicines",
            ],
            [
                "id" => 6,
                "type_id" => 1,
                "name" => "Mettormine",
                "generic_name" => "Glucophage",
                "med_company" => "NHS",
                "exp_date" => "2022-12-08",
                "manufacture_date" => "2020-04-16",
                "price" => 50.0,
                "no_items" => "200",
                "dose_amount" => "500mg",
                "shelf_no" => "PIS-07",
                "prescription" => null,
                "categories" => "General Sales List",
            ],
            [
                "type_id" => 10,
                "name" => "Lolatidine 20mg",
                "generic_name" => "Lor AT adeen",
                "med_company" => "Us Schering-plough",
                "exp_date" => "2023-04-13",
                "manufacture_date" => "2019-11-20",
                "price" => 650.0,
                "no_items" => "60",
                "dose_amount" => "20mg",
                "shelf_no" => "PIS-04",
                "prescription" => null,
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 3,
                "name" => "Tinidazoe",
                "generic_name" => "Antiparasitic",
                "med_company" => "Medscape",
                "exp_date" => "2021-09-17",
                "manufacture_date" => "2021-09-17",
                "price" => 80.0,
                "no_items" => "1000",
                "dose_amount" => "500mg",
                "shelf_no" => "Pis-09",
                "prescription" => null,
                "categories" => "General Sales List",
            ],
            [
                "type_id" => 11,
                "name" => "Eye-Visol",
                "generic_name" => "Eye-Visol",
                "med_company" => "VISUfarma",
                "exp_date" => "2022-02-01",
                "manufacture_date" => "2018-01-01",
                "price" => 50.0,
                "no_items" => "20",
                "dose_amount" => "50mg",
                "shelf_no" => "PIS-12",
                "prescription" => null,
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 12,
                "name" => "Vitamin D3",
                "generic_name" => "cholecalciferol",
                "med_company" => "Carlson D, Ddrops",
                "exp_date" => "2023-02-08",
                "manufacture_date" => "2020-02-08",
                "price" => 90.0,
                "no_items" => "80",
                "dose_amount" => "20mg",
                "shelf_no" => "PIS-01",
                "prescription" => null,
                "categories" => "Prescription Only Medicines",
            ],
            [
                "type_id" => 4,
                "name" => "Omoprazole",
                "generic_name" => "Gastro intestine",
                "med_company" => "Germany",
                "exp_date" => "2023-05-31",
                "manufacture_date" => "2021-01-15",
                "price" => 200.0,
                "no_items" => "2000",
                "dose_amount" => "20-40mg",
                "shelf_no" => "Pis-10",
                "prescription" => null,
                "categories" => "General Sales List"
            ],
        ];
        foreach ($medicines as $drug) {
            if (Medicines::where('name', $drug['name'])->first() == null) {
                Medicines::create($drug);
            }
        }

    }
}
