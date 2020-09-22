<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DailyTimesheet extends JsonResource
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
            'project_id' => $this->name,
            'user_id' => (int) $this->answers,
            'date' => (string) $this->date,
            'hours' => (int) $this->hours,
            'notes ' => (string) $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
