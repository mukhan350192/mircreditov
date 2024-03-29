<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $token string
 * @property $ip string
 * @property $city string
 * @property $device string
 */

class DeviceRequest extends FormRequest
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
            'ip' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'token' => 'Токен нужно объязательно передавать',
            'ip' => 'Айпи объязательно к заполнению'
        ];
    }
}
