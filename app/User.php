<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Utility\Utility;
use Illuminate\Database\Eloquent;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $primaryKey = 'user_id';
    
    public function photos() {
        return $this->hasMany('\App\Models\UserPhotos', 'user_id', 'user_id');
    }
    
    public function getUserDetails($user_id){
        $result = User::with('photos')->leftJoin('user_profile as p','users.user_id','=','p.user_id')->where('users.user_id',$user_id)->first()->toArray();
        //dd($result);
        return $result;
    }
    
    public function getMatchDetails($user_id){
        $result = User::leftJoin('user_match as m','users.user_id','=','m.user_id')->where('users.user_id',$user_id)->first();
        return $result;
    }
}
