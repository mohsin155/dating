<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserImbra extends Model {
    protected $table = 'user_imbra';
    protected $primaryKey = 'imbra_id';
    protected $fillable = ['user_id'];
}