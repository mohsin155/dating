<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Utility\Utility;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use App\Models\UserMatch;
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
        $result = User::select(DB::raw('users.*,p.*,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->with('photos')->leftJoin('user_profile as p','users.user_id','=','p.user_id')
                ->where('users.user_id',$user_id)->first()->toArray();
        return $result;
    }
    
    public function getMatchDetails($user_id){
        $result = UserMatch::where('user_id',$user_id)->first();
        //$result = User::leftJoin('user_match as m','users.user_id','=','m.user_id')->where('users.user_id',$user_id)->first();
        return $result;
    }
}
