<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class rentalPublicationResource extends JsonResource
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
            $this->city,
            $this->estate,
            $this->type,
            $this->caution_month,
            $this->salon
        ]);
    }
}
