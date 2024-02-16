<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "title",
        "slug",
        "price",
        "image",
        "created_at",
        "updated_at"
    ];


    // Relationship to itself for parent-child relationship
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }



   
}
