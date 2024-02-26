<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class ProductVariationAttribute extends Model
{
    protected $table = 'product_variation_attributes';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "product_variation_id",
        "product_attribute_id",
        "product_attribute_value_id",
        "value",
        "created_at",
        "updated_at"
    ];

      // Relationship to itself for parent-child relationship
      public function attribute()
      {
          return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
      }

     
}