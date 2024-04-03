<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subCats(){
        return $this->hasMany(SubCat::class);
    }
}
