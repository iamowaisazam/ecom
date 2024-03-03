<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
use App\Models\Value;
use App\Models\Variation;
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
          
             $groups = [];
             $global_d = [];
             foreach (Setting::all() as $key => $value) {
                $global_d[$value->field] = $value->value;
                array_push($groups,$value->grouping);
             }
             $global_d['grouping'] = implode(',',array_unique($groups)); 
             
             $global_d['menus'] = Menu::with('children.children.children')->get();
            

            $view->with('global_d', $global_d);
           





            $cart_items = [];
          
            $cart = session()->get('cart', []);
            foreach ($cart as $key => $c) {

                $products = Variation::select([
                    'products.id',
                    'products.title',
                    'products.slug',
                    'products.category_id',
                    'products.subcategory_id',
                    'products.subchildcategory_id',
                    'variations.id as variation_id',
                    'variations.sku as sku',
                    'variations.image as image',
                    'variations.quantity as quantity',
                    'variations.price'
                ])
                ->join('products','products.id','=','variations.product_id')
                ->where('variations.id',$c['sku'])
                ->first()
                ->toArray();

               $attributes = Value::select([
                'attributes.title as attribute_title',
                'attributes.id as attribute_id',
                'values.id as values_id',
                'values.title as values_title',
               ])
               ->join('attributes','attributes.id','=','values.attribute_id')
               ->whereIn('values.id',array_values($c['attributes']))
               ->get()
               ->toArray();
               $products['attributes'] = $attributes;
               array_push($cart_items,$products);
            }

            $view->with('carts',$cart_items);

          
          
        });
    }
}
