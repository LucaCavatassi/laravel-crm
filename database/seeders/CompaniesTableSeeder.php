<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newCompany = new Company();
            $newCompany->name = $faker->company();
            $newCompany->logo = $faker->imageUrl();
            $newCompany->vat_num = $faker->numberBetween(10000000000, 99999999999);
            
            $newCompany->save();
        }
    }
}
