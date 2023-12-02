<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Cách 1
//        $category = $this->whenLoaded('category');
//        return [
//            'id' => $this->id,
//            'name' => $this->name,
////            'created_at' => $this->created_at->format('d/m/Y'),
////            'updated_at' => $this->updated_at->format('d/m/Y'),
////            'category' => $this->category,
//            'category' => new CategoryResource($category),
//            'products' => ProductResource::collection($this->whenLoaded('products')),
//        ];


        // Cách 2
        return [
            'id' => $this->id,
            'name' => $this->name,
//            'created_at' => $this->created_at->format('d/m/Y'),
//            'updated_at' => $this->updated_at->format('d/m/Y'),
//            'category' => $this->category,
            'category' => $this->whenLoaded('category', function (){
                return new CategoryResource($this->category);
            }),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
