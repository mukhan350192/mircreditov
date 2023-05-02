<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property $id int
 * @property $name string
 * @property $priority int
 * @property $max_amount int
 * @property $age_min int
 * @property $age_max int
 * @property $consideration_period int
 * @property $period_min int
 * @property $period_max int
 * @property $amount_deal int
 * @property $amount_lead int
 * @property $link string
 * @property $logo string
 * @property $created_at string
 * @property $updated_at string
 */
class CompanyResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'priority' => $this->priority,
            'max_amount' => $this->max_amount,
            'age_min' => $this->age_min,
            'age_max' => $this->age_max,
            'consideration_period' => $this->consideration_period,
            'period_min' => $this->period_min,
            'period_max' => $this->period_max,
            'amount_deal' => $this->amount_deal,
            'amount_lead' => $this->amount_lead,
            'logo' => $this->logo,
            'link' => $this->link,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
