<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $validate = Validator::make($request->all(), [
            'taskid' => 'required',
            'tasktitle' => 'required',
            'taskdesc' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'error_msg' => $validate->errors()
            ]);
        }
        // store task in database...
        Task::create(
            [
                'id' => $request->taskid,
                'title' => $request->tasktitle,
                'description' => $request->taskdesc,
                'status' => $request->taskstatus,
                'priority' => $request->taskpriority,
                'user_id' => 1,
            ]
        );
        return response()->json([
            'status' => 'success',
            'taskid' => $request->taskid,
            'msg' => 'task recived!'
        ]);
    }
}
