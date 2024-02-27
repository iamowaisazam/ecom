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
        'id',
        'title',
        'slug',
        'details',
        'image',
        'parent_id',
        'level',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
        'is_enable',
        'sort',
        'alt',
    ];

    // Relationship to itself for parent-child relationship
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->hasOne(ProductCategory::class, 'parent_id');
    }

    public function img()
    {
        return $this-> belongsTo(Filemanager::class, 'image');
    }



   
}
