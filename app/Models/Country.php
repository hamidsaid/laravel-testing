<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //accessing the post for a specific user through the country table/model
    //has many through relatioship
    //second parameter is the intermeddiate table i.e where it gets the country_id
    //country_id is the 3rd parameter since we folled the convections no need
    //4th parameter is user_id if its not convectional has to be put
    public function posts(){
        return $this->hasManyThrough('App\Models\Post','App\Models\User', 'country_id','user_id');
    }
}
