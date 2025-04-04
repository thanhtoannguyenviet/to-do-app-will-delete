@extends('layouts.app')

@section('title','To do app')
@section('content')
    <a href="{{ route('tasks.create') }}"> + Create Task</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        
            @if (count($tasks)>0)
                @foreach ($tasks as $task )
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->title}}</td>
                    <td>{{$task->completed==true?'COMPLETED':'UNCOMPLETED'}}</td>
                    <td>
                        <a href="{{ route('tasks.detail',['id'=>$task->id]) }}">Detail</a>
                        <a href="{{ route('tasks.edit',['id'=>$task->id]) }}">Edit</a>
                        <form action="{{ route('tasks.delete',['id'=>$task->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No task found</td>
                </tr>
            @endif
    </table>
@endsection