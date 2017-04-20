<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model {
    protected $table = 'user_interest';
    protected $primaryKey = 'interest_id';
    protected $fillable = ['user_id'];
}