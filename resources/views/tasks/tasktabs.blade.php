<div class="tabs">
    <a href="{{ route('tasks.index')}}" class="tab tab-lifted border border-base-300 border-b-0 grow {{ Request::routeIs('tasks.index') ? 'tab-bg-primary' : '' }}">対応中</a>
    <a href="{{ route('tasks.notWorking') }}" class="tab tab-lifted border border-base-300 border-b-0 grow {{ Request::routeIs('tasks.notWorking') ? 'tab-active' : '' }}">未完了</a> 
    <a href="{{ route('tasks.finishWork') }}" class="tab tab-lifted border border-base-300 border-b-0 grow {{ Request::routeIs('tasks.finishWork') ? 'tab-active' : '' }}">完了</a> 
    <!--下記タブはブランクとして使用-->
    <a href="#" class="tab tab-lifted border-b-0 grow"></a>
    <a href="#" class="tab tab-lifted border-b-0 grow"></a>
    <a href="#" class="tab tab-lifted border-b-0 grow"></a>
    <a href="#" class="tab tab-lifted border-b-0 grow"></a>
</div>