<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QAGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function qas(){
        return $this->hasMany(QA::class);
    }
}
