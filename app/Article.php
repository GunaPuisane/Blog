<?php

namespace homePage;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use homePage\User; 
use DB;
use Input;
use Illuminate\Http\Request;

class Article extends Authenticatable
{
    use Notifiable;

    protected $table = 'articles';
    protected $fillable = [
        'title', 'body', 'user_id', 'author', 'image'
    ];
    
    
    public function user(){
        $this->belongsTo(homePage\User);
     }
     
}
