<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class ProductCategory extends Model
{
    protected $table = 'product_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "title",
        "slug",
        "image",
        "created_at",
        "updated_at"
    ];

    // Relationship to itself for parent-child relationship
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }



   
}
