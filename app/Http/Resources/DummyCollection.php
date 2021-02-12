<?php

namespace App\Http\Resources;

use App\Models\Dummy;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DummyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => DummyResource::collection($this->collection)
        ];
    }
}
