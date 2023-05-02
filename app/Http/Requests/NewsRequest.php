<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $title string
 * @property $mini_description string
 * @property $description string
 */

class NewsRequest extends FormRequest
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
            'title' => 'required|string',
            'mini_description' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Титуль должно быть заполнено',
            'mini_description' => 'Мини описание должно быть заполнено',
            'description' => 'Описание должно быть заполнено',
        ];
    }
}
