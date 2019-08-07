<?php

use Illuminate\Database\Seeder;
use App\subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        subject::truncate();

        $faker = \Faker\Factory::create();

        for($i=0;$i<50;$i++){
            subject::create([
                'subject_id'=>$faker->subject_id,
                    'subject_name'=>$faker->subject_name,
                    'credit_hour'=>$faker->credit_hour,
                    'subject_code'=>$faker->subject_code,
                ]

            );
        }
    }
}
