<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientHistoryRequest extends FormRequest
{
    public string $token;
    public string $phone;
    public string $action;
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
            'token' => 'required|string',
            'action' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'Не передан токен действие',
            'action.required' => 'Не передан действие',
        ];
    }
}
