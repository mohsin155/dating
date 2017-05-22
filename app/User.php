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
    
    public function getUserDetails($user_id,$logged){
        $result = User::select(DB::raw('users.*,f.favourite_id,b.block_id,si.interest_id,p.profile_id,p.dob_month,p.dob_year,p.hair_color,p.hair_length,p.hair_type,p.eye_color,p.eye_wear,p.height,p.weight,p.body_type,p.ethnicity,p.facial_hair,p.best_feature,p.body_art,
                p.appearance,p.drink,p.smoke,p.marital_status,p.have_children,p.no_children,p.oldest_child,p.youngest_child,p.more_child,p.have_pets,p.occupation,p.employment,p.income,p.home_type,p.living_situation,p.relocate,
                p.relationship,p.nationality,p.education,p.languages,p.english_ability,p.portugese_ability,p.spanish_ability,p.religion,p.religious_values,p.star_sign,p.profile_heading,p.about_yourself,p.partner,
                (select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->with('photos')->leftJoin('user_profile as p','users.user_id','=','p.user_id')
                ->leftJoin('user_favourites as f','f.favourite_to','=','users.user_id')
                ->leftJoin('user_blocked as b','b.blocked_to','=','users.user_id')
                ->leftJoin('user_showinterest as si','si.interest_to','=','users.user_id')
                ->whereRaw('f.favourite_by = "'.$logged.'" or f.favourite_by is null')
                ->whereRaw('b.blocked_by = "'.$logged.'" or b.blocked_by is null')
                ->whereRaw('si.interest_by = "'.$logged.'" or si.interest_by is null')
                ->where('users.user_id',$user_id)->first()->toArray();
        return $result;
    }
    
    public function getMatchDetails($user_id){
        $result = UserMatch::where('user_id',$user_id)->first();
        //$result = User::leftJoin('user_match as m','users.user_id','=','m.user_id')->where('users.user_id',$user_id)->first();
        return $result;
    }
    
    public function searchResults($inputs,$logged){
        $query = User::select(DB::raw('um.gender as seeking,um.min_age,um.max_age,f.favourite_id,si.interest_id,users.*,ph.photo_name,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->leftJoin('user_profile as p', 'users.user_id', '=', 'p.user_id')
                ->leftJoin('user_photos as ph', 'users.user_id', '=', 'ph.user_id')
                ->leftJoin('user_favourites as f', 'f.favourite_to', '=', 'users.user_id')
                ->leftJoin('user_showinterest as si', 'si.interest_to', '=', 'users.user_id')
                ->leftJoin('user_match as um', 'users.user_id','=','um.user_id')
                ->whereRaw('(f.favourite_by = "' . $logged . '" or f.favourite_by is null)')
                ->whereRaw('(si.interest_by = "' . $logged . '" or si.interest_by is null)');
        if(isset($inputs['keyword']) && !empty($inputs['keyword'])) {
            $query = $query->whereRaw('(users.first_name like "'.$inputs['keyword'].'%" or users.first_name like "'.$inputs['keyword'].'%")');
        }
        if(isset($inputs['first_name']) && !empty($inputs['first_name'])) {
            $query = $query->whereRaw('users.first_name like "'.$inputs['first_name'].'"');
        }
        if(isset($inputs['member_number']) && !empty($inputs['member_number'])) {
            $query = $query->where('users.user_id',$inputs['member_number']);
        }
        if (isset($inputs['gender']) && !empty($inputs['gender'])) {
            $query = $query->where('users.gender', $inputs['gender']);
        }
        if (isset($inputs['min_age']) || isset($inputs['max_age'])) {
            if (!empty($inputs['min_age']) && !empty($inputs['max_age'])) {
                $query = $query->whereBetween('age', array($inputs['min_age'], $inputs['max_age']));
            } elseif (!empty($inputs['min_age'])) {
                $query = $query->where('age', '>=', $inputs['min_age']);
            } elseif (!empty($inputs['max_age'])) {
                $query = $query->where('age', '<=', $inputs['max_age']);
            }
        }
        if (isset($inputs['country']) && !empty($inputs['country'])) {
            $query = $query->where('users.country', $inputs['country']);
        }
        if (isset($inputs['state']) && !empty($inputs['state'])) {
            $query = $query->where('users.state', $inputs['state']);
        }
        if (isset($inputs['city']) && !empty($inputs['city'])) {
            $query = $query->where('users.city', $inputs['city']);
        }
        if (isset($inputs['photo']) && !empty($inputs['photo'])) {
            $query = $query->whereRaw('photo_name is not null');
        }
        if (isset($inputs['last_login']) && !empty($inputs['last_login'])) {
            $query = $query->where('last_login', '>=', DB::raw("CURDATE() - INTERVAL " . $inputs['last_login'] . " DAY"));
        }
        if (isset($inputs['body_type']) && !empty($inputs['body_type'])) {
            if (is_array($inputs['body_type']) && !empty($inputs['body_type'][0])) {
                $query->whereIn('p.body_type', $inputs['body_type']);
            }
        }
        if (isset($inputs['ethnicity']) && !empty($inputs['ethnicity'])) {
            if (is_array($inputs['ethnicity']) && !empty($inputs['ethnicity'][0])) {
                $query->whereIn('p.ethnicity', $inputs['ethnicity']);
            }
        }
        if (isset($inputs['appearance']) && !empty($inputs['appearance'])) {
            if (is_array($inputs['appearance']) && !empty($inputs['appearance'][0])) {
                $query->whereIn('p.appearance', $inputs['appearance']);
            }
        }
        if (isset($inputs['hair_color']) && !empty($inputs['hair_color'])) {
            if (is_array($inputs['hair_color']) && !empty($inputs['hair_color'][0])) {
                $query->whereIn('p.hair_color', $inputs['hair_color']);
            }
        }
        if (isset($inputs['hair_length']) && !empty($inputs['hair_length'])) {
            if (is_array($inputs['hair_length']) && !empty($inputs['hair_length'][0])) {
                $query->whereIn('p.hair_length', $inputs['hair_length']);
            }
        }
        if (isset($inputs['hair_type']) && !empty($inputs['hair_type'])) {
            if (is_array($inputs['hair_type']) && !empty($inputs['hair_type'][0])) {
                $query->whereIn('p.hair_type', $inputs['hair_type']);
            }
        }
        if (isset($inputs['eye_color']) && !empty($inputs['eye_color'])) {
            if (is_array($inputs['eye_color']) && !empty($inputs['eye_color'][0])) {
                $query->whereIn('p.eye_color', $inputs['eye_color']);
            }
        }
        if (isset($inputs['eye_wear']) && !empty($inputs['eye_wear'])) {
            if (is_array($inputs['eye_wear']) && !empty($inputs['eye_wear'][0])) {
                $query->whereIn('p.eye_wear', $inputs['eye_wear']);
            }
        }
        if (isset($inputs['best_feature']) && !empty($inputs['best_feature'])) {
            if (is_array($inputs['best_feature']) && !empty($inputs['best_feature'][0])) {
                $query->whereIn('p.best_feature', $inputs['best_feature']);
            }
        }
        if (isset($inputs['body_art']) && !empty($inputs['body_art'])) {
            if (is_array($inputs['body_art']) && !empty($inputs['body_art'][0])) {
                $query->whereIn('p.body_art', $inputs['body_art']);
            }
        }
        if (isset($inputs['smoke']) && !empty($inputs['smoke'])) {
            if (is_array($inputs['smoke']) && !empty($inputs['smoke'][0])) {
                $query->whereIn('p.smoke', $inputs['smoke']);
            }
        }
        if (isset($inputs['drink']) && !empty($inputs['drink'])) {
            if (is_array($inputs['drink']) && !empty($inputs['drink'][0])) {
                $query->whereIn('p.drink', $inputs['drink']);
            }
        }
        if (isset($inputs['relocate']) && !empty($inputs['relocate'])) {
            if (is_array($inputs['relocate']) && !empty($inputs['relocate'][0])) {
                $query->whereIn('p.relocate', $inputs['relocate']);
            }
        }
        if (isset($inputs['marital_status']) && !empty($inputs['marital_status'])) {
            if (is_array($inputs['marital_status']) && !empty($inputs['marital_status'][0])) {
                $query->whereIn('p.marital_status', $inputs['marital_status']);
            }
        }
        if (isset($inputs['have_children']) && !empty($inputs['have_children'])) {
            if (is_array($inputs['have_children']) && !empty($inputs['have_children'][0])) {
                $query->whereIn('p.have_children', $inputs['have_children']);
            }
        }
        if (isset($inputs['more_child']) && !empty($inputs['more_child'])) {
            if (is_array($inputs['more_child']) && !empty($inputs['more_child'][0])) {
                $query->whereIn('p.more_child', $inputs['more_child']);
            }
        }
        if (isset($inputs['have_pets']) && !empty($inputs['have_pets'])) {
            if (is_array($inputs['have_pets']) && !empty($inputs['have_pets'][0])) {
                $query->whereIn('p.have_pets', $inputs['have_pets']);
            }
        }
        if (isset($inputs['occupation']) && !empty($inputs['occupation'])) {
            if (is_array($inputs['occupation']) && !empty($inputs['occupation'][0])) {
                $query->whereIn('p.occupation', $inputs['occupation']);
            }
        }
        if (isset($inputs['employment']) && !empty($inputs['employment'])) {
            if (is_array($inputs['employment']) && !empty($inputs['employment'][0])) {
                $query->whereIn('p.employment', $inputs['employment']);
            }
        }
        if (isset($inputs['home_type']) && !empty($inputs['home_type'])) {
            if (is_array($inputs['home_type']) && !empty($inputs['home_type'][0])) {
                $query->whereIn('p.home_type', $inputs['home_type']);
            }
        }
        if (isset($inputs['living_situation']) && !empty($inputs['living_situation'])) {
            if (is_array($inputs['living_situation']) && !empty($inputs['living_situation'][0])) {
                $query->whereIn('p.living_situation', $inputs['living_situation']);
            }
        }
        if (isset($inputs['nationality']) && !empty($inputs['nationality'])) {
            if (is_array($inputs['nationality']) && !empty($inputs['nationality'][0])) {
                $query->whereIn('p.nationality', $inputs['nationality']);
            }
        }
        if (isset($inputs['languages']) && !empty($inputs['languages'])) {
            if (is_array($inputs['languages']) && !empty($inputs['languages'][0])) {
                $query->whereIn('p.languages', $inputs['languages']);
            }
        }
        if (isset($inputs['religious_values']) && !empty($inputs['religious_values'])) {
            if (is_array($inputs['religious_values']) && !empty($inputs['religious_values'][0])) {
                $query->whereIn('p.religious_values', $inputs['religious_values']);
            }
        }
        if (isset($inputs['star_sign']) && !empty($inputs['star_sign'])) {
            if (is_array($inputs['star_sign']) && !empty($inputs['star_sign'][0])) {
                $query->whereIn('p.star_sign', $inputs['star_sign']);
            }
        }
        $result = $query->groupBy('users.user_id')->get();
        return $result;
    }
    
    public function getMyFavouritesList($user_id){
        $query = User::select(DB::raw('um.gender as seeking,um.min_age,um.max_age,f.favourite_id,f.created_at as fav_at,users.*,ph.photo_name,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->leftJoin('user_photos as ph', 'users.user_id', '=', 'ph.user_id')
                ->join('user_favourites as f', 'f.favourite_to', '=', 'users.user_id')
                ->leftJoin('user_match as um', 'users.user_id','=','um.user_id')
                ->where('f.favourite_by',$user_id);
        $result = $query->groupBy('users.user_id')->get();
        return $result;
    }
    
    public function getMyBlockedList($user_id){
        $query = User::select(DB::raw('um.gender as seeking,um.min_age,um.max_age,f.favourite_id,si.interest_id,b.block_id,b.created_at as blocked_at,users.*,ph.photo_name,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->leftJoin('user_photos as ph', 'users.user_id', '=', 'ph.user_id')
                ->join('user_blocked as b', 'b.blocked_to', '=', 'users.user_id')
                ->leftJoin('user_match as um', 'users.user_id','=','um.user_id')
                ->leftJoin('user_favourites as f', 'f.favourite_to', '=', 'users.user_id')
                ->leftJoin('user_showinterest as si', 'si.interest_to', '=', 'users.user_id')
                ->where('b.blocked_by',$user_id);
        $result = $query->groupBy('users.user_id')->get();
        return $result;
    }
    
    public function getMyInterestList($user_id){
        $query = User::select(DB::raw('um.gender as seeking,um.min_age,um.max_age,f.favourite_id,si.interest_id,si.created_at as interested_at,users.*,ph.photo_name,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->leftJoin('user_photos as ph', 'users.user_id', '=', 'ph.user_id')
                ->join('user_showinterest as si', 'si.interest_to', '=', 'users.user_id')
                ->leftJoin('user_match as um', 'users.user_id','=','um.user_id')
                ->leftJoin('user_favourites as f', 'f.favourite_to', '=', 'users.user_id')
                ->where('si.interest_by',$user_id);
        $result = $query->groupBy('users.user_id')->get();
        return $result;
    }
    
    public function getUserSummary($user_id, $logged){
        $query = User::select(DB::raw('um.gender as seeking,um.min_age,um.max_age,f.favourite_id,si.interest_id,users.*,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->with('photos')
                ->leftJoin('user_profile as p', 'users.user_id', '=', 'p.user_id')
                ->leftJoin('user_favourites as f', 'f.favourite_to', '=', 'users.user_id')
                ->leftJoin('user_showinterest as si', 'si.interest_to', '=', 'users.user_id')
                ->leftJoin('user_match as um', 'users.user_id','=','um.user_id')
                ->whereRaw('(f.favourite_by = "' . $logged . '" or f.favourite_by is null)')
                ->whereRaw('(si.interest_by = "' . $logged . '" or si.interest_by is null)')
                ->where('users.user_id',$user_id)->first();
        return $query;        
    }
}
