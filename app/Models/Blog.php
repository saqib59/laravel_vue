<?php

namespace App\Models;

use App\Models\Tags;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    protected $fillable = ['id','title','post','featuredImage','metaDescription','post_excerpt','slug','user_id','views'];

    public function setTitleAttribute($title){
        $this->attributes['slug'] = $this->uniqueSlug($title);
    }
    
    public function uniqueSlug($title){
        $slug = Str::slug($title,'-');
        $count = Blog::where('slug','LIKE',"{$slug}%")->count();
        $new_count = $count > 0 ? ++$count : '' ; 
        return  $new_count > 0 ? "$slug-$new_count" : $slug;
    }

    public function tag(){
        return $this->belongsToMany(Tags::class, 'blogtags','blog_id','tag_id');
    }
    public function cat(){
        return $this->belongsToMany(Category::class, 'blogcategories');
    }
}
