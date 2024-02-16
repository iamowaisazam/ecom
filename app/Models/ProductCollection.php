<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class ProductCollection extends Model
{
    protected $table = 'product_collections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "title",
        "slug",
        "parent_id",
        "image",
        "created_at",
        "updated_at"
    ];

     
}