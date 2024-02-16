<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use App\Models\ProductVariation;
use App\Models\ProductVariationAttribute;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    function generateAttributeCombinations($attributes) {
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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function combination_maker()
    {

        $attributes = ProductAttribute::with('values')->get()->toArray();
        $results = $this->generateAttributeCombinations($attributes);

        foreach ($results as $values) {

            $sku = [];
            foreach ($values as $item) {
                array_push($sku,$item['title']);
            }

            $ProductVariation = ProductVariation::create([
                "product_id"=> 3,
                "title" => implode('-',$sku), 
                "sku" => implode('-',$sku),
                "value" => implode('-',$sku) 
            ]);

            foreach ($values as $item) {
                ProductVariationAttribute::create([
                    "product_variation_id" => $ProductVariation->id,
                    "product_attribute_id" => $item['product_attribute_id'],
                    "value" => $item['title'],
                ]);
            }
        }

 
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        
        $blogs = Blog::select([
            'blogs.*',
            'blog_categories.title as cat_title',
        ])
        ->join('blog_categories','blog_categories.id','=','blogs.category_id')
        ->where('featured1',1)
        ->orWhere('featured2',1)
        ->orWhere('featured3',1)
        ->get();

        $categories = ProductCollection::all();
        $brands = Brand::all();
        $products = Product::all();
       
        return view('theme.home',compact('blogs','categories','brands','products'));
    }


     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
    
        $product = Product::where('id',3)->first();

        $variations_id = $product->variations->pluck('id')->toArray();
        $variations = ProductVariationAttribute::select([
            'product_attributes.title',
            'product_variation_attributes.value',
        ])
        ->join('product_attributes','product_attributes.id','=','product_variation_attributes.product_attribute_id')
        ->whereIn('product_variation_attributes.product_variation_id',$variations_id)
        ->get()
        ->toArray();


      
        $groupedData = array_reduce($variations, function ($result, $item) {
            $result[$item['title']][] = $item;
            return $result;
        }, array());
        $vv = [];
        foreach ($groupedData as $key => $value) {
            $rec = array_unique(array_column($value,'value'));
            $vv[$key] = $rec;
        }
        $variations= $vv;

       
     

        



        



        return view('theme.product-detail',compact('product','variations'));
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop()
    {
    
        $data = Product::all();
        $categories = ProductCategory::with('children.children')->where('parent_id', 0)->get();

        return view('theme.shop',compact('data','categories'));
    }

    

     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {

        $data = Product::all();
        return view('theme.cart',compact('data'));
    }

  


    

     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog_categories($id)
    {
        $category = BlogCategory::where('slug',$id)->first();
        if($category == false){
            return back();
        }

        $blogs = Blog::select([
            'blogs.*',
            'blog_categories.title as cat_title',
        ])->join('blog_categories','blog_categories.id','=','blogs.category_id')
        ->where('blogs.category_id',$category->id)
        ->paginate(8);
        
        return view('blogs.blog-categories',compact('category','blogs'));
    }

    

  

  
}
