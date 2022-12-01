@extends('layouts.app')

@section('content')
    <div class="flex justify-center text-5xl mt-16">タスク一覧</div>
    <div class="grid grid-cols-12 gap-10">
        @include('tasks.tasklist')
    </div>
@endsection