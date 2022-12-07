@extends('layouts.app')

@section('content')
    <div class="flex justify-center text-4xl mt-12">slack設定</div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('slack.save', Auth::id()) }}" class="w-1/2">
            @csrf
            <div class="form-control mt-8 mb-16">
                {{-- タスク入力 --}}
                <label for"title" class="label">
                    <span class="label-text text-lg">slack送信機能(タスク完了時)</span>
                    <label class="label cursor-pointer">
                        <span class="label-text">OFF</span> 
                        <input type="radio" name="use_slack" value='0' class="radio checked:bg-blue-500" {{ old('use_slack',$use_slack) == '0' ? 'checked' : ''}} />
                    </label>
                    <label class="label cursor-pointer">
                        <span class="label-text">ON</span> 
                        <input type="radio" name="use_slack" value='1' class="radio checked:bg-blue-500" {{ old('use_slack',$use_slack) == '1' ? 'checked' : ''}} />
                    </label>
                </label>
                {{-- 内容入力 --}}
                <label for"title" class="label mt-10">
                    <span class="label-text text-lg">Slack Webhook URL</span>
                </label>
                <input type="text" class="input input-bordered w-full" value="{{ old('url', $url) }}" name="url">

                <div class="flex justify-between mt-16 mx-12">
                    <button type="submit" class="btn bg-blue-600 text-xl w-28">保存</button>
                    <a class="btn btn-grey text-xl w-28" href="{{ route('tasks.index') }}">戻る</a>
                </div>
            </div>
        </form>
    </div>
@endsection