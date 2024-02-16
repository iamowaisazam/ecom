<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{

    protected $table = 'product_attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "title",
        "created_at",
        "updated_at"
    ];

    // Relationship to itself for parent-child relationship
    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }



   
}
