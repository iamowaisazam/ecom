<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use App\Models\ProductVariation;
use App\Models\ProductVariationAttribute;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        // dd($results);

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
                    "product_attribute_value_id" => $item['id'],
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
        
        $releated_products = Product::query()->limit(5)->get();

        $product = Product::where('id',3)->first();
        $variations_id = $product->variations->pluck('id')->toArray();
        $variations = ProductVariationAttribute::select([
            'product_attributes.id as attribute_id',
            'product_attributes.title',
            'product_variation_attributes.value',
            'product_attribute_value_id',
        ])
        ->join('product_attributes','product_attributes.id','=','product_variation_attributes.product_attribute_id')
        ->whereIn('product_variation_attributes.product_variation_id',$variations_id)
        ->get()
        ->toArray();


        $attributes = ProductAttribute::whereIN('id',array_unique(array_column($variations,'attribute_id')))->get();
        $attribute_values = ProductAttributeValue::whereIn('id',array_unique(array_column($variations,'product_attribute_value_id')))->get();

        $variations = ProductVariation::select([
            'product_variations.id as variation_id',
            'product_variations.sku',
            'product_variations.quantity',
            'product_variations.price',
            'product_variations.image',
            'product_attributes.id as attribute_id',
            'product_attributes.title as attribute_title',
            'product_attribute_values.id as value_id',
            'product_attribute_values.title as value_title',
        ])
        ->join('product_variation_attributes','product_variation_attributes.product_variation_id','=','product_variations.id')
        ->join('product_attributes','product_attributes.id','=','product_variation_attributes.product_attribute_id')
        ->join('product_attribute_values','product_attribute_values.id','=','product_variation_attributes.product_attribute_value_id')
        ->where('product_variations.product_id',3)
        ->get()
        ->toArray();

        return view('theme.product-detail',compact(
            'product',
            'attributes',
            'attribute_values',
            'variations',
            'releated_products'
        ));


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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_to_cart(Request $request)
    {

        // dd($request->all());

        $cart = session()->get('cart', []);
        $sku = ProductVariation::where('id',$request->sku)->first();

        if(isset($cart[$request->sku])) {
            $cart[$request->sku]['quantity']++;
        } else {
            $cart[$request->sku] = [
                "sku" => $request->sku,
                "quantity" => $request->quantity,
                "price" => $sku->price,
                "attributes" => $request->attr,
            ];
        }
        session()->put('cart', $cart);

        return back()->with('success','Product Added In Cart'); 
            
    }



     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart_remove($id)
    {

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success','Item Removed In Cart'); 
            
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
