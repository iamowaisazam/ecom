<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "title",
        "slug",
        'sort',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'alt',
        "image",
        "created_at",
        "updated_at"
    ];



   
}
