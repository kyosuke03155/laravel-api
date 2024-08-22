<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200, [], JSON_UNESCAPED_UNICODE)
                         ->header('Content-Type', 'application/json; charset=UTF-8');
    }

    // Create a new task
    public function store(Request $request)
    {
        // リクエストデータのバリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);
    
        // タスクを作成し、is_doneを強制的にfalseに設定
        $task = Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'is_done' => false, // デフォルトで未完了とする
        ]);
    
        // JSONレスポンスを返す（文字化け防止のためにcharset=UTF-8を指定）
        return response()->json($task, 201, [], JSON_UNESCAPED_UNICODE)
                         ->header('Content-Type', 'application/json; charset=UTF-8');
    }

    // Get a task by ID
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404, [], JSON_UNESCAPED_UNICODE)
                             ->header('Content-Type', 'application/json; charset=UTF-8');
        }

        return response()->json($task, 200, [], JSON_UNESCAPED_UNICODE)
                         ->header('Content-Type', 'application/json; charset=UTF-8');
    }

    public function update(Request $request, $id)
{
    $task = Task::find($id);

    if (!$task) {
        return response()->json(['message' => 'Task not found'], 404, [], JSON_UNESCAPED_UNICODE)
                         ->header('Content-Type', 'application/json; charset=UTF-8');
    }

    // リクエストデータのバリデーション
    $validatedData = $request->validate([
        'title' => 'string|max:255',
        'description' => 'string|max:1000',
        'isDone' => 'boolean',
    ]);

    // 'isDone'を 'is_done' に変換して保存
    $task->update([
        'title' => $validatedData['title'] ?? $task->title,
        'description' => $validatedData['description'] ?? $task->description,
        'is_done' => $validatedData['isDone'],  // ここでキー名を変換
    ]);

    return response()->json($task, 200, [], JSON_UNESCAPED_UNICODE)
                     ->header('Content-Type', 'application/json; charset=UTF-8');
}


    // Delete a task by ID
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404, [], JSON_UNESCAPED_UNICODE)
                             ->header('Content-Type', 'application/json; charset=UTF-8');
        }

        $task->delete();

        return response()->json(null, 204)
                         ->header('Content-Type', 'application/json; charset=UTF-8');
    }
}
