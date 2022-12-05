<div class="tabs tabs-boxed w-1/2">
    <a href="{{ route('tasks.working') }}" class="tab tab-lifted text-xl grow {{ Request::routeIs('tasks.working') ? 'tab-active' : '' }}">対応中</a>
    <a href="{{ route('tasks.notWorking') }}" class="tab tab-lifted text-xl grow {{ Request::routeIs('tasks.notWorking') ? 'tab-active' : '' }}">未完了</a> 
    <a href="{{ route('tasks.finishWork') }}" class="tab tab-lifted text-xl grow {{ Request::routeIs('tasks.finishWork') ? 'tab-active' : '' }}">完了</a> 
</div>