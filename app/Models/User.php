<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //one to one relationship
    public function post(){
        //second parameter is the name of the foreign key(i.e of the user) in posts table
        //second parameter is optional if the default is used
        return $this->hasOne('App\Models\Post', 'user_id');
    }

     //many to many relationship
     public function posts(){
        //second parameter is the name of the foreign key(i.e of the user) in posts table
        //second parameter is optional if the default is used
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
        //If you were not using the convetional laravel naming of the pivot table
        //e.g role_user. You have to pass in extra parameters specifying the table
        //name and he foreign keys
       // return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id' , 'role_id');


    }
}
