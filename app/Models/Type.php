<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public function dummies(){
        return $this->hasMany('App\Models\Dummy','typeId','id');
    }

    protected $fillable =[
        'name'
    ];
}
