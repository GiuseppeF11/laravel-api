<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;
use App\Models\Technology;

// Helpers
use Illuminate\Support\Facades\Schema;

class ProjectTechnologySeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            $technologies = Technology::inRandomOrder()->get();
            $counter = 0;
            $maxTechnologies = rand(0, 5);
            foreach ($technologies as $technology) {
                if ($counter < $maxTechnologies) {
                    $project->technologies()->attach($technology->id);
                    $counter++;
                }
                else {
                    break;
                }
            }
        }
    }
}