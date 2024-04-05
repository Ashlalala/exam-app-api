<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnsweredQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function startedExam(){
        return $this->belongsTo(StartedExam::class);
    }
}
