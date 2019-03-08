@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-lg-offset-3">
            <form action="/create/todo" method=post>
            {{ csrf_field() }}
            <input type="text" class="form-control input-lg" name="todo" placeholder="Create new todo" required=required>
        </form>
        </div>
    </div>
        <br>
        @foreach($todos as $todo)
        {{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"> x </a> <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-danger btn-xs"> update </a> 

        @if(!$todo->completed)
            <a href="{{ route('todos.completed', ['id' => $todo->id])}}" class="btn btn-xs btn-success">Mark as completed</a>
        @else
        <span class="text-success">Finished</span>
        @endif
        <hr>
        @endforeach
@stop