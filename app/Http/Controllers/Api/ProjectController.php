<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show(string $slug) {
        $project = Project::where('slug', $slug)->firstOrFail(); /* Uso un filtraggio tramite slug che completerà quindi */ 
        return response()->json([                                       /* la query per arrivare al singolo progetto */
            'success' => true,
            'results' => $project,
        ]);
    }
}
