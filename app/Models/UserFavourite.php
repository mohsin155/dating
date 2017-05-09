<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavourite extends Model {
    protected $table = 'user_favourites';
    protected $primaryKey = 'favourite_id';
    protected $fillable = ['favourite_id','favourite_to','favourite_by'];
}