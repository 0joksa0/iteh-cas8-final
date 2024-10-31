<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable=[
        'title',
        'excerpt',
        'body',
        'slug',
        'category_id',
        'user_id'
    ];

    protected $guarded=[
        'id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
