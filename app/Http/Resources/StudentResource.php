<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'Student';

    public function toArray($request) {
        return [
            'id' => $this->resource->id,
            'broj_indeksa' => $this->resource->broj_indeksa,
            'ime_prezime' => $this->resource->ime_prezime,
            'datum_rodjenja' => $this->resource->datum_rodjenja,
            'email' => $this->resource->email,
            'mesto_stanovanja' => $this->resource->mesto_stanovanja
        ];
    }
}
