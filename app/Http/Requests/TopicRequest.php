<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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

            'import_id' => 'required|unique:topics,import_id',
            'office_id' => 'required',
            'name' => 'required|max:300',
            'side_id' => 'required',
            'file' => 'required',
            'vic_sign' => 'required',
            'import_date' => 'required',
            'recived_date' => 'required',
            'state' => 'required',
            'notes' => 'required|max:1000',

        ];
    }
    public function messages()
    {
        return [
            'import_id.required' => ' رقم المكاتبة مطلوب',
            'import_id.unique' => ' رقم المكاتبة مكرر ',
            'office_id' => 'الحقل مطلوب',
            'name' => 'الحقل مطلوب',
            'name.max' => 'عدد الحروف أكثر من 300',
            'side_id' => 'الحقل مطلوب',
            'file' => 'الحقل مطلوب',
            'vic_sign' => 'الحقل مطلوب',
            'import_date' => 'الحقل مطلوب',
            'recived_date' => 'الحقل مطلوب',
            'state' => 'الحقل مطلوب',
            'notes.required' => 'الحقل مطلوب',
            'notes.max' => 'عدد الحروف أكثر من 1000',

        ];
    }
}
