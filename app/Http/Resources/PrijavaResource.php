<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrijavaResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id' => $this->resource->id,
            'student_id' => $this->resource->student_id,
            'ispit_id' => $this->resource->ispit_id,
            'ispitni_rok' => $this->resource->ispitni_rok,
            'datum_prijave' => $this->resource->datum_prijave
        ];
    }
}
