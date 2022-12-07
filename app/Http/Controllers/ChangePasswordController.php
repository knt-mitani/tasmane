<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('change_passowrd.form');
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // // パスワードリセット処理
        // function ($user) use ($request) {
        //     $user->forceFill([
        //         'password' => Hash::make($request->password),
        //         'remember_token' => Str::random(60),
        //     ])->save();
        //     event(new PasswordReset($user));
        // }        
        
        if(!password_verify($request->current_passowrd, $user->password)) {
            dd(password_verify($request->current_passowrd, $user->password));
            return redirect('change_passowrd.form');
        }
        
        $user->password = password_hash($request->currect_password, PASSWORD_DEFAULT);
        
        $user->save();
        
        return view('/');
    }
}
