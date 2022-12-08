<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    // false:バリデーション処理無効, true:バリデーション処理有効
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:30',           // タイトル
            'content' => 'required|string|max:50',         // 内容
            'importance' => 'required|integer|min:1|max:3',     // 重要度
            'status' => 'required|integer|min:1|max:3',         // 状態
            'deadline' => 'required|date',          // 期日
        ];
    }
}
