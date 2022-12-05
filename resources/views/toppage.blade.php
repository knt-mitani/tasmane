@extends('layouts.app')

@section('content')
    <div class="prose hero bg-200 mx-auto max-w-full">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                <h1>タスマネアプリへようこうそ！</h1>
                <div>
                    {{-- ログインページへのリンク --}}
                    <h2>ログインする</h2>
                    <a class="btn btn-info btn-lg text-xl w-1/2" href="{{ route('login') }}">ログイン</a>
                </div>
                <div>
                    {{-- ユーザ登録ページへのリンク --}}
                    <h2>会員登録をする</h2>
                    <a class="btn btn-error btn-lg text-xl w-1/2" href="{{ route('register') }}">登録</a>
                </div>
            </div>
        </div>
    </div>
@endsection