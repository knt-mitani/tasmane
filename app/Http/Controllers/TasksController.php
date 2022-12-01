<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class TasksController extends Controller
{
    private $tasks;
    
    private $status = [
        1 => '未対応',
        2 => '対応中',
        3 => '完了'
    ];
    
    private $importance = [
        1 => '高',
        2 => '中',
        3 => '低'
    ];
    
    // function __construct()
    // {
    //     $this->tasks = new Task;
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            
            $task = new Task;
            
            $tasks = $task
                        ->where('user_id', Auth::id())
                        ->where('status', 2)
                        ->get();
                        
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

            return view('tasks.index', ['tasks' => $tasks]);
        } else {
            return view('toppage');
        }
    }
    
    public function notWorking()
    {
        if (Auth::check()) {
            
            $task = new Task;
        
            $tasks = $task
                        ->where('user_id', Auth::id())
                        ->where('status', 1)
                        ->get();
            return view('tasks.index', ['tasks' => $tasks]);
        } else {
            return view('toppage');
        }
    }
    
    public function finishWork()
    {
        if (Auth::check()) {
            
            $task = new Task;
        
            $tasks = $task
                        ->where('user_id', Auth::id())
                        ->where('status', 3)
                        ->get();

            return view('tasks.index', ['tasks' => $tasks]);
        } else {
            return view('toppage');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            
            
            // $tasks = $this->tasks->where('user_id', Auth::id());
            
            $setCreateValue = [
                'importance' => $this->importance,
                'status' => $this->status           
            ];

            return view('tasks.create')->with($setCreateValue);
        } else {
            return view('toppage');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // postデータをセット
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->importance = $request->importance;
        $task->status = $request->status;
        $task->deadline = $request->deadline;

        // データをSQLに保存
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
