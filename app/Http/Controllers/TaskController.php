<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{

    public function index()
    {
        $subject = Subject::all();
        $classes = Classes::all();
        $task = Task::all();
        $data = [
            'classes' =>  $classes,
            'datas' => $task,
            'subjects' => $subject,
        ];
        return  view("Task", $data);
    }
    public function create(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->classes_id = $request->classes_id;
        $task->subjects_id = $request->subjects_id;
        $task->started = $request->started;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->save();

        Alert::success('anjay', 'data lu udah di buat');
        return back();
    }
    public function delete($id)
    {
        $task = Task::where("id", $id)->first();
        $task->delete();
        Alert::success('Anjay', 'Data udah di apus');
        return back();
    }
    public function update(Request $request, $id)
    {
        
        $task = Task::where("id", $id)->first();
        $task->name = $request->name;
        $task->classes_id = $request->classes_id;
        $task->subjects_id = $request->subjects_id;
        $task->started = $request->started;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->save(); 
        Alert::success('Anjay', 'Data udah di edit cuy');

        return back();
    }
}
