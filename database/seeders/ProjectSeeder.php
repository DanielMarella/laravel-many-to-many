<?php

namespace Database\Seeders;

use App\Models\Admin\Project;
use App\Models\Admin\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();

        for ($i=0; $i < 100 ; $i++) { 
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($types)->id;
            $newProject->title = ucfirst($faker->unique()->words(4,true));
            $newProject->content = $faker->paragraph(10,true);
            $newProject->slug = $faker->slug();
            $newProject->image = $faker->imageUrl();
            $newProject->save();
        }
    }
}
