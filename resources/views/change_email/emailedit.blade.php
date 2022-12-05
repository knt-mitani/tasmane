@extends('layouts.app')

@section('content')


    <div class="flex justify-center text-4xl mt-12">メールアドレス変更</div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('change_email.update',Auth::id()) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control mt-8 mb-16">
                {{-- タスク入力 --}}
                <label for"title" class="label">
                    <span class="label-text">現在のメールアドレス</span>
                </label>
                <input type="text" class="input input-bordered w-full" value="{{ $user_email }}" name="current_email" disabled>
                {{-- 内容入力 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text ">新しいメールアドレス</span>
                </label>
                <input type="text" class="input input-bordered w-full" name="new_email" value="{{ old('new_email') }}">

                {{-- 状態選択 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text">新しいメールアドレス(確認)</span>
                </label>
                <input type="text" class="input input-bordered w-full" name="new_email_confirmation" value="{{ old('new_email_confirmation') }}">

                <div class="flex justify-between mt-16 mx-12">
                    <button type="submit" class="btn btn-info w-28">変更</button>
                    <a class="btn btn-grey w-28" href="{{ route('tasks.index') }}">戻る</a>
                </div>
            </div>
        </form>
    </div>
@endsection