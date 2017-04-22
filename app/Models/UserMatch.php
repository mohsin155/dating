<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMatch extends Model {
    protected $table = 'user_match';
    protected $primaryKey = 'match_id';
    protected $fillable = ['user_id'];
}