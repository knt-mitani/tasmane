@extends('layouts.app')

@section('content')


    <div class="flex justify-center text-4xl mt-12">タスク編集</div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control mt-8 mb-16">
                {{-- タスク入力 --}}
                <label for"title" class="label">
                    <span class="label-text text-lg">タスク</span>
                </label>
                <input type="text" class="input input-bordered w-full" value="{{ old('title', $task->title) }}" name="title">
                {{-- 内容入力 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text text-lg">内容</span>
                </label>
                <input type="text" class="input input-bordered w-full" value="{{ old('content', $task->content) }}" name="content">

                {{-- 状態選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text text-lg">状態</span>
                </label>
                <select class="select select-bordered w-full" name="status">
                    @foreach ($status as $key => $value)
                        @if((old('status', $task->status) == $key))
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </select>
                {{-- 重要度選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text text-lg">重要度</span>
                </label>
                <select class="select select-bordered w-full" name="importance">
                    @foreach ($importance as $key => $value)
                        @if((old('importance', $task->importance) == $key))
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </select>
                
                {{-- 期限選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text text-lg">期限</span>
                </label>
                <input type="date" class="input input-bordered w-full" value="{{ old('deadline', $task->deadline) }}" name="deadline">
                @if ($use_slack == "1")
                    <label for"title" class="label mt-10">
                        <span class="label-text text-lg">Slack送信機能を使う (状態が完了のみ送信)</span>
                        <label class="label cursor-pointer">
                            <input type="checkbox"  name="use_slack" value='on' class="checkbox checkbox-error" />
                        </label>
                    </label>
                @endif

                <div class="flex justify-between mt-16 mx-12">
                    <button type="submit" class="btn bg-blue-600 text-xl w-28">保存</button>
                    <a class="btn btn-grey text-xl w-28" href="{{ route('tasks.index') }}">戻る</a>
                </div>
            </div>
        </form>
    </div>
@endsection