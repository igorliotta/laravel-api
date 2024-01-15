<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['Camera', 'Pc', 'Microscope', 'Library', 'Gym', 'Gallery', 'Graphic', 'Typography', 'Vaccine'];
        

        foreach ($technologies as $technology_name) {

            $technology = new Technology();

            $technology->name = $technology_name;
            $technology->slug = Str::slug($technology_name);
            
            $technology->save();


        }
    }
}
