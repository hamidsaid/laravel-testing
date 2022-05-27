<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //one to one inverse relationship
    //second parameter is optional if the default is used
    public function user(){
        return $this->belongsTo("App\Models\User", 'user_id');
    }
}
