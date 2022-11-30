@extends('layouts.app')

@section('content')


    <div class="prose ml-4">
        <h2>タスク作成</h2>
    </div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('tasks.store') }}" class="w-1/2">
            @csrf
            <div class="form-control my-4">
                {{-- タスク入力 --}}
                <label for"title" class="label">
                    <span class="label-text">タスク</span>
                </label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="title">
                {{-- 内容入力 --}}
                <label for"title" class="label">
                    <span class="label-text">内容</span>
                </label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="content">
                
                
                {{-- 状態選択 --}}
                <label for"title" class="label">
                    <span class="label-text">状態</span>
                </label>
                <select class="select select-bordered w-full max-w-xs" name="status">
                    @foreach ($status as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    
                </select>

                {{-- 重要度選択 --}}
                <label for"title" class="label">
                    <span class="label-text">重要度</span>
                </label>
                <select class="select select-bordered w-full max-w-xs" name="importance">
                    @foreach ($importance as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                
                {{-- 期限選択 --}}
                <label for"title" class="label">
                    <span class="label-text">期限</span>
                </label>
                <input type="date" class="input input-bordered w-full max-w-xs" name="deadline">
            </div>
            <button type="submit" class="btn btn-primary btn-outline">作成</button>
        </form>
    </div>
@endsection