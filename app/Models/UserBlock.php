<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBlock extends Model {
    protected $table = 'user_blocked';
    protected $primaryKey = 'block_id';
    protected $fillable = ['block_id','blocked_to','blocked_by'];
}