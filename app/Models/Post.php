<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_post', 'post_id', 'category_id');
    }
}
