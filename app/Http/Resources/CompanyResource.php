<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'logo' => $this->priority,
            'max_amount' => $this->max_amount,
            'age_min' => $this->age_min,
            'age_max' => $this->age_max,
            'consideration_period' => $this->consideration_period,
            'period_min' => $this->period_min,
            'period_max' => $this->period_max,
            'amount_deal' => $this->amount_deal,
            'amount_lead' => $this->amount_lead,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
