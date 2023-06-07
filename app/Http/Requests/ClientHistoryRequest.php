<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $token
 * @property string $action
 * @property string $phone
 * @property string $utm_source
 * @property string $utm_content
 * @property string $utm_medium
 * @property string $utm_term
 * @property string $utm_campaign
 * @property string $web_id
 */

class ClientHistoryRequest extends FormRequest
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
