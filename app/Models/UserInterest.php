<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model {
    protected $table = 'user_showinterest';
    protected $primaryKey = 'interest_id';
    protected $fillable = ['interest_id','interest_to','interest_by'];
}