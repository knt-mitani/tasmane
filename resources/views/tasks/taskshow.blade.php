<div class="overflow-x-auto">
    <table class="table w-full border border-base-300">
        <thread>
            <!-- テーブル見出し -->
            <tr>
                <th class="border-b"></th>
                <th class="border-b w-16">No</th>
                <th class="border-b w-2/5">タスク名</th>
                <th class="border-b w-3/5">内容</th>
                <th class="border-b w-16">重要度</th>
                <th class="border-b w-24">期限</th>
            </tr>
        </thread>
        <tbody>
            @if (isset($tasks))
                @foreach($tasks as $task)
                    <tr class="hover">
                        <th><input type="radio" name="id" value="{{ $task->id }}"></th>
                        <th>{{ $task->id }}</th>
                        <th>{{ $task->title }}</th>
                        <th>{{ $task->content }}</th>
                        <th>{{ $task->importance }}</th>
                        <th>{{ $task->deadline }}</th>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>