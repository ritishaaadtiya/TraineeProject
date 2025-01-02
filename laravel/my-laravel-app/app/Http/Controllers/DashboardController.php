<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use  App\Models\registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\Models\Task;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $user = Auth::user();
        $username = $user->username;
        $userid =  $user->id;
        $tasks =  Task::where('user_id', $userid)->simplePaginate(perPage: 5);
        return view('dashboard', compact('username', 'tasks'));
    }

    # update functionality
    public function updateForm($id)
    {
        $tasks = Task::find($id);
        return view('update', compact('tasks'));
    }
    public function updateTask(Request $request, $id)
    {


        // Validate the input
        $validate = Validator::make($request->all(), [
            'tasktitle' => 'required|string|max:255',
            'taskdesc' => 'required|string',
        ]);

        // Return validation errors if any
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'error_msg' => $validate->errors(),
            ], 422);
        }
        if ($request->hasFile('taskattachment')) {
            $file = $request->file('taskattachment');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments', $fileName, 'public');
        }
        # Get the tasks
        $task = Task::find($id);
        #update the task
        $task->update([
            // 'title' => $request->tasktitle,
            // 'description' => $request->taskdesc,
            // 'status' => $request->taskstatus,
            // 'priority' => $request->taskpriority,
            // 'due_date' => $request->taskdue,
            'title' => $request->tasktitle ?? $task->title,
            'description' => $request->taskdesc ?? $task->description,
            'status' => $request->taskstatus ?? $task->status,
            'priority' => $request->taskpriority ?? $task->priority,
            'due_date' => $request->taskdue ?? $task->due_date,
            'attachment' => $filePath
        ]);
        # return the success message
        return response()->json([
            'status' => 'success',
            'msg' => 'updated successfully',
            'file' => $filePath
        ]);
    }
    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Task deleted successfully',
        ]);
        //return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }
    public function logout()
    {
        $user = Auth::user();
        // DB::table('registrations')
        //     ->where('id', Auth::id())
        //     ->update(['remember_token' => null]);
        Auth::logout();
        $rememberTokenCookieName = 'remember_registration_' . sha1(config('app.key'));
        // Cookie::queue(Cookie::forget($rememberTokenCookieName));
        return response()->json([
            'user' => $user,
            'status' => 'success',
            'msg' => 'Logged out successfully',
            'cookiename' =>  $rememberTokenCookieName
        ]);
    }
}
