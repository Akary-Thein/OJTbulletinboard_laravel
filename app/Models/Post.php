<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Post extends Model 
{ 
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'description', 'status' ,'create_user_id', 'updated_user_id', 'deleted_user_id'];

    public function user() {
        return $this->belongsTo(User::class,'create_user_id');
    }
}
