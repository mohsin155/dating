<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPhotos extends Model {
    protected $table = 'user_photos';
    protected $primaryKey = 'photo_id';
    public $timestamps = true;
}