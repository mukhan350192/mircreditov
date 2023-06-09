<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $name string
 * @property $logo
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

class CompanyRequest extends FormRequest
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
        dd($this->all());
        return [
            'name' => 'required|string',
            'logo' => 'required|file',
            'max_amount' => 'required|int',
            'age_min' => 'required|int',
            'age_max' => 'required|int',
            'consideration_period' => 'required|int',
            'period_min' => 'required|int',
            'period_max' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Имя должно быть заполнено',
            'logo.required' => 'Файл нужно загрузить',
            'max_amount.required' => 'Максимальная сумма нужно заполнить',
            'age_min.required' => 'Минимальная возраст нужно заполнить',
            'age_max.required' => 'Максимальная возраст нужно заполнить',
            'consideration_period.required' => 'Время рассмотрение нужно заполнить',
            'period_min.required' => 'Минимальная срок надо заполнить',
            'period_max.required' => 'Максимальную срок надо заполнить'
        ];
    }
}
