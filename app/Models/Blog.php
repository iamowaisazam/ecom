<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'meta_title',
        'meta_description',
        'category_id',
        'meta_keywords',
        'short_des',
        'long_des',
        'created_at',
        'updated_at',
        'banner',
        'sort',
        'banner_alt',
        'alt',
    ];



   
}
