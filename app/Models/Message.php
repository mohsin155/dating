<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model {
    public $timestamps = true;
    protected $primaryKey = 'message_id';
public $fillable = ['to_id', 'message'];
    public function user()
{
  return $this->belongsTo('\App\Models\User', 'user_id', 'to_id');
}
    public function getConversation($to, $from){
        $result = Message::whereRaw('(from_id = '.$from.' and to_id = '.$to.') or (from_id = '.$to.' and to_id = '.$from.')')
                ->orderBy('created_at','asc')->get();
        return $result;
    }
    
    public function updateRead($to,$from){
        $result = Message::whereRaw('(from_id = '.$from.' and to_id = '.$to.')')
                ->update(array('read_status'=>1));
        return $result;
    }
    
    public function getMessageList($page_no, $logged_in, $folder_id, $favourites=0){
        $query = Message::select('messages.*','users.first_name','users.age',DB::raw('(select photo_name from user_photos where user_photos.user_id = messages.from_id limit 0,1) as photo'),
                DB::raw('(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,
                (select name from cities as c where users.city=c.id) as city_name'))
                ->join('users','users.user_id','=','messages.from_id')
                ->where('to_id',$logged_in)->where('folder_id',$folder_id)->where('messages.deleted_at',NULL);
        if($favourites){
            $query = $query->whereRaw('from_id in (select favourite_to from user_favourites where favourite_by = '.$logged_in.')');
        }else{
            $query = $query->whereRaw('from_id not in (select favourite_to from user_favourites where favourite_by = '.$logged_in.')');
        }
        $total = $query->count(DB::raw('DISTINCT messages.from_id'));
        $query = $query->groupBy('from_id');
        
        $messages = $query->skip($page_no*config('constants.msg_per_page'))->limit(config('constants.msg_per_page'))->get();
        return array("list"=>$messages,"total"=>$total);
    }
    
    public function getSentList($page_no, $logged_in){
        $query = Message::select('messages.*','users.first_name','users.age',DB::raw('(select photo_name from user_photos where user_photos.user_id = messages.from_id limit 0,1) as photo'),
                DB::raw('(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,
                (select name from cities as c where users.city=c.id) as city_name'))
                ->join('users','users.user_id','=','messages.from_id')
                ->where('from_id',$logged_in)->where('messages.deleted_at',NULL);
        $total = $query->count(DB::raw('DISTINCT messages.to_id'));
        $query = $query->groupBy('to_id');
        
        $messages = $query->skip($page_no*config('constants.msg_per_page'))->limit(config('constants.msg_per_page'))->get();
        return array("list"=>$messages,"total"=>$total);
    }
    
    public function getTrashList($page_no, $logged_in){
        $query = Message::select('messages.*','users.first_name','users.age',DB::raw('(select photo_name from user_photos where user_photos.user_id = messages.from_id limit 0,1) as photo'),
                DB::raw('(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,
                (select name from cities as c where users.city=c.id) as city_name'))
                ->join('users','users.user_id','=','messages.from_id')
                ->where('to_id',$logged_in)->where('messages.deleted_at','!=', NULL);
        $total = $query->count(DB::raw('DISTINCT messages.to_id'));
        $query = $query->groupBy('from_id');
        
        $messages = $query->skip($page_no*config('constants.msg_per_page'))->limit(config('constants.msg_per_page'))->get();
        return array("list"=>$messages,"total"=>$total);
    }
    
    public function getSentConversation($from, $to){
        $result = Message::whereRaw('(from_id = '.$from.' and to_id = '.$to.') or (from_id = '.$to.' and to_id = '.$from.')')
                ->orderBy('created_at','asc')->get();
        return $result;
    }
}