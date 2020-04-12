<?php

use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccines = \App\Vaccine::create([
          'vaccine_name' => 'hello',
          'vaccine_description' => 'something something',
          'vaccine_side_effect' => 'this',
          'diseases_description' => 'something disease something disease',
          'qualified_candidate' => 'child',
          'disqualified_candidate' => 'pregnant women',
          'precautions' => 'don\'t know',
          'required_doses' => 4,
          'age' => 2
        ]);
    }
}
