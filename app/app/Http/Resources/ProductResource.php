<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'scu' => $this->scu,
            'category' => $this->category,
            'tags' => $this->tags,
            'price' => $this->price,
            'image' => $this->image,
            'discount ' => $this->discount,
            'discount_id ' => $this->discount_id,
        ];
    }
}
