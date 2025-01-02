<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function showform()
    {
        return view('create');
    }
    public function store_task(Request $request)
    {
        # Acess token
        $token = $request->BearerToken();
        // Validate the input
        $validate = Validator::make($request->all(), [
            'tasktitle' => 'required|string|max:255',
            'taskdesc' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240'
        ]);

        $status = $request->taskstatus;
        $priority = $request->taskpriority;
        if (empty($status)) {
            $status = 'pending';
        }
        if (empty($priority)) {
            $priority = 'low';
        }
        // Return validation errors if any
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'error_msg' => $validate->errors(),
            ], 422);
        }

        // Check if a file has been uploaded
        if ($request->hasFile('taskattachment')) {
            $file = $request->file('taskattachment');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments', $fileName, 'public');
            $fileUrl = Storage::url($filePath);
        }
        // Get the authenticated user
        $user = Auth::user();

        // Store the task in the database
        $task = Task::create([
            'title' => $request->tasktitle,
            'description' => $request->taskdesc,
            'status' => $status,
            'priority' => $priority,
            'user_id' => $user->id,
            'attachment' => $filePath
        ]);

        // Return success response
        return response()->json([
            'status' => 'success',
            'task_id' => $task->id,
            'msg' => 'Task successfully created!',
            'token' => $token,
            'file' => $fileUrl
        ], 201);
    }
}
