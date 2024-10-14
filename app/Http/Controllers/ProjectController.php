<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(['projects' => Project::all()]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
        ]);

        $project = Project::create($request->all());

        return response()->json(['message' => 'Dự án được tạo thành công', 'project' => $project], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return response()->json(['message' => 'Dự án được cập nhật', 'project' => $project]);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Dự án được xóa']);
    }
}
