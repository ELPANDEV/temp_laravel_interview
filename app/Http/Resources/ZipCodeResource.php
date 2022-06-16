<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ZipCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'zip_code' => $this->zip_code,
            'locality' => $this->cities->count() > 0
                ? mb_strtoupper(x_remove_accents($this->cities[0]->name))
                : '',
            'federal_entity' => [
                'key'  => intval($this->federal_entity->code),
                'name' => mb_strtoupper(x_remove_accents($this->federal_entity->name)),
                'code' => null,
            ],
            'settlements' => $this->settlements->map(function ($settlement) {
                return [
                    'key'  => intval($settlement->code),
                    'name' => mb_strtoupper(x_remove_accents($settlement->name)),
                    'zone_type' => mb_strtoupper(x_remove_accents($settlement->zone_type)),
                    'settlement_type' => [
                        'name' => $settlement->settlement_type->name
                    ]
                ];
            }),
            'municipality' => [
                'key'  => intval($this->municipality->code),
                'name' => mb_strtoupper(x_remove_accents($this->municipality->name)),
            ]
        ];
    }
}
