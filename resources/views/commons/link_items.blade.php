@if (Auth::check())
    {{-- メールアドレス変更へのリンク --}}
    <li><a class="link link-hover" href="{{ route('change_email.index') }}">メールアドレス変更</a></li>
    <li class="divider lg:hidden"></li>
    {{-- パスワード変更へのリンク --}}
    <li><a class="link link-hover" href="{{ route('password.form') }}">パスワード変更</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">登録</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
@endif