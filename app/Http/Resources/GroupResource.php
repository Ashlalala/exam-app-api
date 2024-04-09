<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'exam_id' => $this->exam_id,
            'qas' => $this->qas,
            'ans_fake' => $this->ans_fake,
            'score' => $this->score,
            'started_exam_id' => $this->started_exam_id,
            'group_id' => $this->group_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
