<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Dummy extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    // public function getAgeAttribute(){
    //     $diff = Carbon::now()->diff($this->birthday);
    //     return "{$diff->y} years {$diff->m} months";
    // }
    
    protected $fillable = [
        'name'
    ];
}
