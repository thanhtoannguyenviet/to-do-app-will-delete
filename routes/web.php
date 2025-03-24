<?php

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
// Tạo data giả
// xóa list Tasks -> 
Route::get('/', function () {
    $tasks = Task::latest('id')->get();
    return view('index',['tasks'=>$tasks]);
})->name('tasks.index');

Route::get('tasks/create',function (){
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {  
    $task = Task::findOrFail($id);
    return view('detail',['task'=>$task]);
})->name('tasks.detail');

Route::post('tasks',function(TaskRequest $request){
    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required|min:3|max:255',
    //     'long_description' => 'required|min:3|max:255',
    // ]);
    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->completed = false;// set default value = false;
    // $task->save();
    $task = Task::create($request->validated());
    return redirect()->route('tasks.index')->with('success','Task created successfully');
})->name('tasks.store');

Route::get('tasks/{id}/edit',function($id){
    $task = Task::findOrFail($id);
    return view('edit',['task'=>$task]);
})->name('tasks.edit');

Route::put('tasks/{id}', function($id, TaskRequest $request){
    Task::findOrFail($id)->update($request->validated());
    return redirect()->route('tasks.index')->with('success','Task updated successfully');
})->name('tasks.update');
Route::delete('tasks/{id}',function($id){
    $task = Task::findOrFail($id); // row =>
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task deleted successfully');
})->name('tasks.delete');