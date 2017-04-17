<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPersonality extends Model {
    protected $table = 'user_personality';
    protected $primaryKey = 'personality_id';
    protected $fillable = ['user_id'];
}