<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','body','descrip','tag','thumnail','cat_id','author','status'];

    public function userInfo()
    {
        return $this->belongsTo(User::class ,'author');
    }

    public function category()
    {
        return $this->belongsTo(category::class , 'cat_id' );
    }
}
