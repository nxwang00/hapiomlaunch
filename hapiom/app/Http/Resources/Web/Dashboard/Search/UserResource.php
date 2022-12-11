<?php

namespace App\Http\Resources\Web\Dashboard\Search;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'image'      =>  url('assets/dashboard/img/avatar71-sm.webp'),
            'name'       =>  $this->name,
            'message'    =>  '',
            'icon'       =>  'olymp-happy-face-icon',
        ];
    }
}
