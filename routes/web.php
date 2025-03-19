<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
// Tạo data giả
// xóa list Tasks -> 
Route::get('/', function () {
    $tasks = Task::latest('title')->get();
    return view('index',['tasks'=>$tasks]);
});

Route::get('/tasks/{id}', function ($id) {  
    $task = Task::findOrFail($id);
    return view('detail',['task'=>$task]);
})->name('tasks.detail');