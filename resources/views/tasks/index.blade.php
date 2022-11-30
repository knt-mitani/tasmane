@extends('layouts.app')

@section('content')
    <a class="btn btn-outline" href="{{ route('tasks.create') }}">作成</a>
    @include('tasks.tasklist')
@endsection