@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <div class="text-4xl mt-12">ログイン</div>
    </div>

    <div class="flex justify-center  mt-8 mb-16">
        <form method="POST" action="{{ route('login') }}" class="w-1/2">
            @csrf

            <div class="form-control mt-10">
                <label for="email" class="label">
                    <span class="label-text text-lg">メールアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control mt-10">
                <label for="password" class="label">
                    <span class="label-text text-lg">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <div class="flex justify-between mt-16 mx-24">
                <button type="submit" class="btn btn-info text-xl w-28">ログイン</button>
                <a class="btn btn-grey text-xl w-28" href="/">戻る</a>
            </div>
        </font>
    </div>
@endsection