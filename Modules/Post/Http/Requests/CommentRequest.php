<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|string|min:2|max:255|unique:comments,comment,' . $this->id,
            'post_id' => 'nullable|exists:posts,id',

        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'هذا الحقل مطلوب',
            'comment.string' => 'يجب ان يكون من نوع صحيح',
            'comment.min' => 'يجب ان يكون عدد الحروف اكبر من حرفين',
            'comment.max' => 'لقد وصلت الي الحد الاقصي من الحروف',
            'comment.unique' => 'هذا التعليق مكرر من قبل',

            'post_id.exists' => 'هذا الرقم غير معرف في جدول الاساسي'

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
