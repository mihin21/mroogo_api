<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class salePublicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray([
            $this->user,
            $this->service,
            $this->city->city_name,
            $this->estate->estate_name,
        ]);
    }
}
