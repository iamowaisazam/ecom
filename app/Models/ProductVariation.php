<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class ProductVariation extends Model
{
    protected $table = 'product_variations';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "product_id",
        "sku",
        "quantity",
        "price",
        "image",
        "created_at",
        "updated_at"
    ];


     // Relationship to itself for parent-child relationship
     public function attributes()
     {
         return $this->hasMany(ProductVariationAttribute::class, 'product_variation_id');
     }

  

     
}