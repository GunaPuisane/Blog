<?php

namespace homePage;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use homePage\Article;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    public $fillable = [
        'username', 'first_name', 'last_name', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function user(){
       $this->hasMany(homePage\post);
    }
}
