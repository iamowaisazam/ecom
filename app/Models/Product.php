<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "id",
        "title",
        "slug",
        "price",
        "selling_price",
        "sku",
        "category_id",
        "subcategory_id",
        "subchildcategory_id",
        "image",
        "images",
        "type",
        "hover_image",
        "is_featured",
        "is_popular",
        "details",
        "description",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "is_enable",
        "created_at",
        "updated_at",
    ];


    // Relationship to itself for parent-child relationship
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    function generateAttributeCombinations($atts) {


        $attributes = [];
        foreach ($atts as $key => $value) {
            $patr = ProductAttribute::where('id',$key)->first();
            $pval = ProductAttributeValue::whereIn('id',$value)->get()->toArray();
            if($patr){
                $patr = $patr->toArray();
                $patr['values'] = $pval;
                array_push($attributes,$patr);
            }
        }

        $result = [[]]; // Initialize with an empty combination
        
        foreach ($attributes as $attribute) {
            $currentResult = [];
    
            foreach ($result as $item) {
                foreach ($attribute['values'] as $value) {
                    $currentResult[] = array_merge($item, [ $value]);
                }
            }
    
            $result = $currentResult;
        }
    
        return $result;
    }

    public function get_images()
    {  
        return Filemanager::whereIn('id',array_map('intval', explode(',',$this->images)))->get();
    }

    public function get_gallery()
    {  
        $img = explode(',',$this->images);
        array_push($img,$this->image);
        array_push($img,$this->hover_image);

        return Filemanager::whereIn('id',array_map('intval',$img))->get();
    }

    public function get_thumbnail()
    {   
        return Filemanager::where('id',$this->image)->first();
    }

    public function get_hover_image()
    {
        return Filemanager::where('id',$this->hover_image)->first();
    }

    public function get_category()
    {
        return ProductCategory::where('id',$this->category_id)->first();
        
    }




   
}
