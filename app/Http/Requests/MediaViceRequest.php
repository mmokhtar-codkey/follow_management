<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaViceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|max:255',
            'description' => 'required|max:400',
            'date' => 'required',
            'attach' => 'required|max:255',

        ];
    }
    public function messages()
    {
        return [
            'title.required' => ' العنوان مطلوب ',
            'title.max' => ' الحد المطلوب من الحروف 255 ',
            'description.required' => ' الوصف مطلوب ',
            'description.max' => '   الحد المطلوب من الحروف 400 ',
            'date.required' => ' التاريخ مطلوب ',
            'attach.required' => ' الملف المرفق مطلوب ',
            'attach.max' => ' الحد الأقصي من الحروف لاسم الملف المرفق 255 ',

        ];
    }
}
