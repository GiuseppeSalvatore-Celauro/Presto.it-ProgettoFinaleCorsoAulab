<?php

namespace App\Models;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =[
        'profile_id',
        'comment',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profile(){
        return $this->belongsTo(Profile::class);
    }


}
