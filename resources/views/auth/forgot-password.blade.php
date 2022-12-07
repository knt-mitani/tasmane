@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <div class="text-4xl mt-12">パスワード再登録</div>
    </div>

    <div class="flex justify-center  mt-8 mb-16">
        <form method="POST" action="{{ route('password.email') }}" class="w-1/2">
            @csrf
            <div class="form-control mt-10">
                <label for="email" class="label">
                    <span class="label-text">メールアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full" required autofocus>
            </div>

            <div class="flex justify-between mt-16 mx-24">
                <button type="submit" class="btn btn-primary btn-block normal-case w-28">送信</button>
                <a class="btn btn-grey w-28" href="/">戻る</a>
            </div>
        </font>
    </div>
@endsection