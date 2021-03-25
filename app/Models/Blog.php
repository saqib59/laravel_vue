<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['id','title','post','featuredImage','metaDescription','post_excerpt','slug','user_id','views'];
}
