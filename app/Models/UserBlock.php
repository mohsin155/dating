<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBlock extends Model {
    protected $table = 'user_block';
    protected $primaryKey = 'block_id';
    protected $fillable = ['block_id','block_to','block_by'];
}