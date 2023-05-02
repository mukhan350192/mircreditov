<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $newsID integer
 * @property $title string
 * @property $mini_description string
 * @property $description string
 */

class NewsEditRequest extends FormRequest
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
            'newsID' => 'required|integer|exists:news,id',
            'title' => 'required|string',
            'mini_description' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
