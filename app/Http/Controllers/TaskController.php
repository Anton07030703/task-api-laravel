<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =Task::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
   $validatedData = $request->validate([
    'title' => 'required|string|max:100|regex:/^[\p{L}\p{N}\p{P}\p{S}\s]+$/u',
    'description' => 'required|string|max:1000|regex:/^[\p{L}\p{N}\p{P}\p{S}\s]+$/u',
]);

    $task = Task::create($validatedData);
    $task->refresh();
    return response()->json($task, 201);
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
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'sometimes|string|max:20|regex:/^[\p{L}\s]+$/u',
        ]);

        $task->update($validatedData);

        return response()->json([
            'task' => $task,
            'message' => 'Задача обновлена!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
        'message' => 'Задача номер '.$task->id.' успешно удалена.'
    ], 200);
    }
}
