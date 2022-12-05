@extends('layouts.app')

@section('content')


    <div class="flex justify-center text-4xl mt-12">パスワード変更</div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('password.change',Auth::id()) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control mt-8 mb-16">
                {{-- タスク入力 --}}
                <label for"title" class="label">
                    <span class="label-text">現在のパスワード</span>
                </label>
                <input type="password" class="input input-bordered w-full" value="" name="current_password">
                {{-- 内容入力 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text ">新しいパスワード</span>
                </label>
                <input type="password" class="input input-bordered w-full" value="" name="new_password">

                {{-- 状態選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text">新しいパスワード(確認)</span>
                </label>
                <input type="password" class="input input-bordered w-full" value="" name="new_password_confirm">

                <div class="flex justify-between mt-16 mx-12">
                    <button type="submit" class="btn btn-info w-28">変更</button>
                    <a class="btn btn-grey w-28" href="{{ route('tasks.index') }}">戻る</a>
                </div>
            </div>
        </form>
    </div>
@endsection