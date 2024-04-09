<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnsweredGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function startedExam(){
        return $this->belongsTo(StartedExam::class);
    }

    public function answeredQuestions(){
        return $this->hasMany(AnsweredQuestion::class);
    }
}
