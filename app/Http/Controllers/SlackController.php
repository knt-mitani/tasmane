<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\SlackRequest;
use App\Notifications\Slack;
use App\Models\SlackChannels;
use Auth;

class SlackController extends Controller
{
    use Notifiable;

    /**
     * slack設定画面の表示
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $slack_channels = new SlackChannels;
        
        // slack機能設定値を取得
        $getSlackSetting = $slack_channels::where('user_id', Auth::id())->first();
        
        //dd($getSlackSetting);
        
        // DBデータnull対策
        if(is_null($getSlackSetting)) {
            $use_slack = 0;
            $url = '';
        } else {
            $use_slack = $getSlackSetting->use_slack;
            $url = $getSlackSetting->url;
        }
        
        $setSlackSetting = [
            'use_slack' => $use_slack,
            'url' => $url,
        ];

        return view('slack_setting.setting')->with($setSlackSetting);
    }
    
    /**
     * slack設定値の作成or更新処理
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        
        // 初期バリデーション条件
        $validateRules = [
            'use_slack' => 'required'    
        ];
        
        // slack機能ONならば、urlのバリデーションを追加
        if ($request->use_slack == 1) {
            $validateRules['url'] = 'required|url';
        }
        
        $request->validate($validateRules);

        // ユーザidに紐づいたデータを取得する条件
        $updateJudgeParam = ['user_id' => Auth::id()];
        
        // 更新または作成するデータ
        $saveValue = [
            'user_id' => Auth::id(),
            'use_slack' => $request->use_slack,
            'url' => $request->url,
        ];

        // 更新または作成処理
        $slack = SlackChannels::updateOrCreate(
            $updateJudgeParam,
            $saveValue,
        );
        
        return redirect('/');
    }

    /**
     * Slackへの通知
     *
     * @param string $title
     * @return redirect
     */
    public function send($title)
    {
        $user_name = Auth::user()->name;
        // $user_name = $user::where('id', Auth::)
        $sentence = "下記のタスクが完了しました。" . PHP_EOL .
                    "" . PHP_EOL . 
                    "************完了タスク************" . PHP_EOL .
                    "ユーザ名：$user_name". PHP_EOL . 
                    "タスク名：$title"  . PHP_EOL .
                    "************************************";

        $this->notify(new Slack($sentence));

    }

    /**
     * 通知を行うWebhook URLの設定
     *
     * @param mix $notification
     * @return slackWebhookUrl
     */
    public function routeNotificationForSlack($notification)
    {
        $slackChannels = new SlackChannels;
        
        $slack_url = $slackChannels::where('user_id', Auth::id())->first();
        
        // $test = $slack_url->url;
        // dd($test);
        // foreach ($slack_url as $value){
        // dd($value->url);
            
        // }
        
        return $slack_url->url;
        
        // return config('app.slack_url');
    }
}