<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Auth;

class TasksController extends Controller
{
    /** @var array 状態 */
    private $status = [
        1 => '未対応',
        2 => '対応中',
        3 => '完了'
    ];
    
    /** @var array 重要度 */
    private $importance = [
        1 => '高',
        2 => '中',
        3 => '低'
    ];

    /**
     * ログイン済or未ログインか判定して処理する
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('toppage');
        }
        return redirect('working');
    }
    
    /**
     * 未対応タスクデータ取得
     *
     * @return array $tasks:未対応タスクデータ
     */
    public function notWorking()
    {
        if (!Auth::check()) {
            return view('toppage');
        }
        
        $tasks = $this->getTaskCategoryDate(1);
    
        return view('tasks.index', ['tasks' => $tasks]);
    }
    
    /**
     * 対応中タスクデータ取得
     *
     * @return array $tasks:対応中タスクデータ
     */
    public function working()
    {
        if (!Auth::check()) {
            return view('toppage');
        }
    
        $tasks = $this->getTaskCategoryDate(2);
    
        return view('tasks.index', ['tasks' => $tasks]);
    }
    
    /**
     * 完了タスクデータ取得
     *
     * @return array $tasks:完了タスクデータ
     */
    public function finishWork()
    {
        if (!Auth::check()) {
            return view('toppage');
            
        }
        
        $tasks = $this->getTaskCategoryDate(3);

        return view('tasks.index', ['tasks' => $tasks]);
    }
    
    /**
     * 対応カテゴリ別のタスク取得
     * 
     * @param int $status 1:未対応, 2:対応中, 3:完了
     * @return array $tasks:対応カテゴリ別のタスクデータ
     */
    private function getTaskCategoryDate($status)
    {
        $task = new Task;
    
        $tasks = $task
                ->where('user_id', Auth::id())
                ->where('status', $status)
                ->orderByRaw('deadline asc, importance asc, title asc')
                ->get();
                
        // 重要度を番号から名称に変更する処理
        foreach($tasks as $value)
        {
            $check = $value->importance;

            // 状態を名称に変換
            switch ($value->importance) {
                case 1:
                    $value->importance = $this->importance[1];
                    break;
                case 2:
                    $value->importance = $this->importance[2];
                    break;
                case 3:
                    $value->importance = $this->importance[3];
                    break;
            }
        }
        
        return $tasks;
    }

    /**
     * タスク作成画面への遷移処理
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return view('toppage');
        }
        
        $setCreateValue = [
            'importance' => $this->importance,
            'status' => $this->status           
        ];

        return view('tasks.create')->with($setCreateValue);
    }

    /**
     * 新規タスクデータ保存処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new Task;
        
        // postデータをセット
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->importance = $request->importance;
        $task->status = $request->status;
        $task->deadline = $request->deadline;

        // データをDBに保存
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        //
    }

    /**
     * タスク編集画面への遷移処理
     *
     * @param  int  $id タスクid
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        $setEditValue = [
            'task' => $task,
            'importance' => $this->importance,
            'status' => $this->status,
        ];

        return view('tasks.taskedit')->with($setEditValue);
    }

    /**
     * タスクデータ更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id タスクid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        
        $task->title = $request->title;
        $task->content = $request->content;
        $task->importance = $request->importance;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        
        $task->save();
        
        return redirect('/');
    }

    /**
     * タスクデータ削除処理
     *
     * @param  int  $id タスクid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        
        if (Auth::id() === $task->user_id) {
            $task->delete();
        }
        
        return redirect('/');
    }
}
