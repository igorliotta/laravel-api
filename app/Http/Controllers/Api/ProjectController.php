<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        
        $projects = Project::with('type', 'technologies')->paginate(30);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(Project $project) {

        $project->load('type', 'technologies');

        return response()->json([
            'project' => $project
        ]);

    }
}
