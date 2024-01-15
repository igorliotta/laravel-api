<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {

        $types = Type::all();
        $typeIds = $types->pluck('id');

        $technologies = Technology::all();
        $technologyIds = $technologies->pluck('id');

        for ($i = 0; $i < 100; $i++) {

            $new_project = new Project();

            $new_project->title = $faker->sentence(5);
            $new_project->content = $faker->text(400);
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->type_id = $faker->optional()->randomElement($typeIds);
            
            $new_project->save();

            $new_project->technologies()->attach($faker->randomElements($technologyIds, null));
        }
    }
}
