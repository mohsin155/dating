<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model {
    protected $table = 'users_setting';
    protected $primaryKey = 'setting_id';
    protected $fillable = ['user_id'];
}