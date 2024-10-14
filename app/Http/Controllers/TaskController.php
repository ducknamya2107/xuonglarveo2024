<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($projectId)
    {
        $project = Project::findOrFail($projectId);
        return response()->json(['tasks' => $project->tasks]);
    }

    public function show($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        return response()->json($task);
    }

    public function store(Request $request, $projectId)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Chưa bắt đầu,Đang thực hiện,Đã hoàn thành',
        ]);

        $project = Project::findOrFail($projectId);
        $task = $project->tasks()->create($request->all());

        return response()->json(['message' => 'Nhiệm vụ được tạo', 'task' => $task], 201);
    }

    public function update(Request $request, $projectId, $taskId)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Chưa bắt đầu,Đang thực hiện,Đã hoàn thành',
        ]);

        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $task->update($request->all());

        return response()->json(['message' => 'Nhiệm vụ được cập nhật', 'task' => $task]);
    }

    public function destroy($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $task->delete();

        return response()->json(['message' => 'Nhiệm vụ được xóa']);
    }
}
