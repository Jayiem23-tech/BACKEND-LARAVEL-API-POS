<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Category;
class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code'=> $this->code,
            'name'=> $this->name,
            'price'=> $this->price,
            'picture_originalName'=> $this->picture,
            'category_id'=> Category::find($this->categories_id)->id,
            'category'=> Category::find($this->categories_id)->name 
        ];
    }
}
