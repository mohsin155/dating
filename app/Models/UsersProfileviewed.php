<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersProfileviewed extends Model {
    protected $table = 'users_profileviewed';
    protected $primaryKey = 'viewed_id';
    protected $fillable = ['viewed_id','viewed_to','viewed_by'];
}
