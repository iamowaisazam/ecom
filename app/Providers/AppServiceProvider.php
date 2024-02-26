<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariation;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        //
        View::composer('*', function ($view) {
            $blogs_category = BlogCategory::all();
            $groups = [];
          
             $global_d = [];
             foreach (Setting::all() as $key => $value) {
                $global_d[$value->field] = $value->value;
                array_push($groups,$value->grouping);
             }
             $global_d['grouping'] = implode(',',array_unique($groups)); 
            

            $view->with('global_d', $global_d);
            $view->with('blogs_category', $blogs_category);


            $cart_items = [];
          
            $cart = session()->get('cart', []);
            foreach ($cart as $key => $c) {

                $products = ProductVariation::select([
                    'products.id',
                    'products.title',
                    'products.slug',
                    'products.category_id',
                    'products.subcategory_id',
                    'products.subchildcategory_id',
                    'product_variations.id as variation_id',
                    'product_variations.sku as sku',
                    'product_variations.image as image',
                    'product_variations.quantity as quantity',
                    'product_variations.price'
                ])
                ->join('products','products.id','=','product_variations.product_id')
                ->where('product_variations.id',$c['sku'])
                ->first()
                ->toArray();

               $attributes = ProductAttributeValue::select([
                'product_attributes.title as attribute_title',
                'product_attributes.id as attribute_id',
                'product_attribute_values.id as product_attribute_values_id',
                'product_attribute_values.title as product_attribute_values_title',
               ])
               ->join('product_attributes','product_attributes.id','=','product_attribute_values.product_attribute_id')
               ->whereIn('product_attribute_values.id',array_values($c['attributes']))
               ->get()
               ->toArray();
               $products['attributes'] = $attributes;
               array_push($cart_items,$products);
            }

            $view->with('carts',$cart_items);

          
          
        });
    }
}
