<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newEmployee = new Employee();
            $newEmployee->name = $faker->firstName();
            $newEmployee->surname = $faker->lastName();
            $newEmployee->email = $faker->email();
            $newEmployee->phone = $faker->phoneNumber();
            $newEmployee->company_id = $faker->numberBetween(11, 20);

            $newEmployee->save();
        }
    }
}
