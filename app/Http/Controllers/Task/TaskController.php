<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
    return view('backend.products.index',[
        'tasks' => $tasks
         ]);

    }
    public function edit($id){
        $task = Task::find($id);
        return view('task.edit',[
            'task' => $task
        ]);
    }
    public function create(){
       return view('backend.products.create');
    }
    public function store(Request $request)
    {
        // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $priority = $request->get('priority');
        $deadline = str_replace('T', ' ',$deadline). ':00';

        // Tạo dữ liệu mới
        $task = new Task();
        $task->name = $name;
        $task->status = 1;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->priority = $priority;
        $task->save();
        return redirect()->route('task.index');
    }
    public function update(Request $request, $id)
    {
        // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $deadline = str_replace('T', ' ',$deadline). ':00';
        // Cập nhật
        $task = Task::find($id);
        $task->name = $name;
        $task->status = 1;
        $task->content = $content;
        $task->deadline = $deadline;

        $task->save();
        return redirect()->route('task.index');

    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index');
    }
    public function complete($id){
        $task = Task::find($id);
        $task->status = 2;
        $task->save();
        return redirect()->route('task.index');
    }
    public function reComplete($id){
        $task = Task::find($id);
        $task->status = 1;
        $task->save();
        return redirect()->route('task.index');

    }
    public function dashboard(){
        return view('backend.dashboard');
    }
    public function products(){
        return view('backend.products.index');
    }
}

