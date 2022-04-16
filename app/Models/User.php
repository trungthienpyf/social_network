<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
