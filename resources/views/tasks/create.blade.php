@extends('layouts.app')

@section('content')


    <div class="flex justify-center text-4xl mt-12">タスク作成</div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('tasks.store') }}" class="w-1/2">
            @csrf
            <div class="form-control mt-8 mb-16">
                {{-- タスク入力 --}}
                <label for"title" class="label">
                    <span class="label-text">タスク</span>
                </label>
                <input type="text" class="input input-bordered w-full" name="title">
                {{-- 内容入力 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text ">内容</span>
                </label>
                <input type="text" class="input input-bordered w-full" name="content">

                {{-- 状態選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text">状態</span>
                </label>
                <select class="select select-bordered w-full" name="status">
                    @foreach ($status as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>

                {{-- 重要度選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text">重要度</span>
                </label>
                <select class="select select-bordered w-full" name="importance">
                    @foreach ($importance as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                
                {{-- 期限選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text">期限</span>
                </label>
                <input type="date" class="input input-bordered w-full" name="deadline">
                <div class="flex justify-between mt-16 mx-12">
                    <button type="submit" class="btn btn-info w-28">作成</button>
                    <a class="btn btn-grey w-28" href="{{ route('tasks.index') }}">戻る</a>
                </div>
            </div>
        </form>
    </div>
@endsection