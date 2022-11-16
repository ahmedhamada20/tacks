<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:200',
            'photo' => 'nullable|image|mimes:jpeg,bmp,png|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'name.string' => 'يجب ان يكون من نوع صحيح',
            'name.min' => 'يجب ان يكون عدد الحروف اكبر من حرفين',
            'name.max' => 'لقد وصلت الي الحد الاقصي من الحروف',


            'photo.required' => 'هذا الحقل مطلوب',
            'photo.image' => 'يجب ان يكون صوره فقط',
            'photo.mimes' => 'يجب ان يكون نوع الصروه صحيحا',
            'photo.max' => 'حجم الصوره كبير جدا',



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
