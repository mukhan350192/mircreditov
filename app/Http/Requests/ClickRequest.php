<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $phone
 * @property string $clickID
 * @property int $companyID
 */

class ClickRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|string',
            'clickID' => 'required|string',
            'companyID' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Нужно заполнить телефон',
            'clickID.required' => 'Клик айди нужно заполнить',
            'companyID' => 'Нужно заполнить компании айди'
        ];
    }
}
