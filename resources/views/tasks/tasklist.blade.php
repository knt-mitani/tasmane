@if (isset($tasks))
    <ul class="list-none">
        @foreach ($tasks as $task)
            <li class="flex items-center gap-x-2 mb-4">
                <div>
                    <p>ok</p>
                    <div>
                        {{ $task->id }}
                        {{ $task->title }}
                        {{ $task->content }}
                        {{ $task->importance }}
                        {{ $task->deadline }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}

@endif