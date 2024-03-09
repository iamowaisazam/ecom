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
           
        });

    }
}
