<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StorePostaRequest extends FormRequest
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
     * @return array<string, Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'posta_num' => 'required|max:1',
            'body' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'posta_num.required' => ' رقم المكاتبة مطلوب',
            'posta_num.max' => 'الحد الأقصي للرقم 1',

        ];
    }
}
