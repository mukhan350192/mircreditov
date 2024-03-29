<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $companyID int
 * @property $name string
 * @property $priority integer
 * @property $max_amount int
 * @property $age_min int
 * @property $age_max int
 * @property $consideration_period int
 * @property $period_min int
 * @property $period_max int
 * @property $amount_deal int
 * @property $amount_lead int
 * @property $link string
 */

class CompanyEditRequest extends FormRequest
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
            'companyID' => 'required|integer|exists:company,id',
            'name' => 'required|string',
            'max_amount' => 'required|integer',
            'age_min' => 'required|integer',
            'age_max' => 'required|integer',
            'consideration_period' => 'required|integer',
            'period_min' => 'required|integer',
            'period_max' => 'required|integer',
            'link' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя компании объязательно нужно заполнить',
            'max_amount' => 'Максимальную сумму нужно заполнить',
            'age_min' => 'Минимальный возраст нужно объязательно заполнить',
            'age_max' => 'Максимальный возраст нужно объязательно заполнить',
            'consideration_period' => 'Время рассмотрение нужно объязательно заполнить',
            'period_min' => 'Минимальный срок нужно объязательно заполнить',
            'period_max' => 'Максимальный срок нужно объязательно заполнить',
            'link.required' => 'Ссылку нужно объязательно заполнить',
        ];
    }
}
