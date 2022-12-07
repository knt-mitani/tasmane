<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class ChangeEmailController extends Controller
{
    /**
     * メールアドレス変更画面へ遷移
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $user_email = $user->email;
        
        $setEmail = ['user_email' => $user_email];

        return view('change_email.form')->with($setEmail);
    }

    /**
     * メールアドレス更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $new_email = $request->new_email;

        $request->validate([
            'new_email' => 'required|email:filter,dns|confirmed:new_email'
        ]);
        
        $user = Auth::user();
        $get_user = $user::find(Auth::id());
            
        $get_user->email = $new_email;
        $get_user->save();

        return redirect('/');
    }
}
