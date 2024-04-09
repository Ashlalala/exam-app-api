<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QAResource extends JsonResource
{
    function myEncrypt($data, $key, $iv)
    {
        $key = md5($key);
        $cryptText = openssl_encrypt($data,"aes-256-cbc",$key ,OPENSSL_RAW_DATA,$iv);
        return base64_encode($cryptText);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $myKey = '5NmhVXqSro6j9eyNO3bzw';

        $myIv = '1234567890123456';


        return [
            'id' => $this->id,
            'examId' => $this->examId, //change to exam_id
            'question' => $this->question,
            'ans_r' => $this->myEncrypt($this->ans_r, $myKey, $myIv),
            'ans_1' => $this->myEncrypt($this->ans_1, $myKey, $myIv),
            'ans_2' => $this->myEncrypt($this->ans_2, $myKey, $myIv),
            'ans_3' => $this->myEncrypt($this->ans_3, $myKey, $myIv),
            'ans_4' => $this->myEncrypt($this->ans_4, $myKey, $myIv),
            'ans_5' => $this->myEncrypt($this->ans_5, $myKey, $myIv),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}


