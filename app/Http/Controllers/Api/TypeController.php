<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Project;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $type->load('projects', 'projects.technologies');

        $projects = Project::with('technologies')->where('type_id', $type->id)->orderBy('updated_at', 'desc')->paginate();

        return response()->json([
            'type' => $type,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
