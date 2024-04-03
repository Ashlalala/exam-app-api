<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
