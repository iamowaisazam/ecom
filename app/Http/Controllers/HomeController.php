<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Value;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Page;
use App\Models\ProductCollection;
use App\Models\Variation;
use App\Models\VariationAttribute;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\HtmlPart;
use Illuminate\Support\Facades\App;


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

 


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        // session()->put('cart',[]);
        
        $categories = Category::where('is_enable',1)->where('is_featured',1)->where('parent_id',null)->get();
        // dd($categories);
        $sliders = Slider::where('is_enable',1)->get(); 
        $products = Product::where('is_enable',1)->where('is_featured',1)->get();
       
        return view('theme.home',compact('categories','products','sliders'));
    }


     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
       
        $releated_products = Product::query()->limit(5)->get();
        $product = Product::with(['variations.attributes.values','variations.attributes.attribute'])
        ->where('slug',$id)
        ->first();

        $attributes = [];
        $values = [];
        $variations = [];

        $arrays = [];
        foreach ($product->variations as $key => $variation) {
            foreach ($variation->attributes as $attribute) {
                
                array_push($variations,[
                    'variation_id' => $variation->id,
                    'sku' => $variation->sku,
                    'quantity' => $variation->quantity,
                    'price' => $variation->price,
                    'image' => $variation->image,
                    'attribute_id' => $attribute->attribute->id,
                    'attribute_title' => $attribute->attribute->title,
                    'value_id' => $attribute->values->id,
                    'value_title' => $attribute->values->title
                ]);
                $attributes[$attribute->attribute->id] = $attribute->attribute->toArray();
                $values[$attribute->values->id] = $attribute->values->toArray();
             
            }
            
        }

        return view('theme.product.product-detail',compact(
            'product',
            'attributes',
            'values',
            'variations',
            'releated_products'
        ));


    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop(Request $request)
    {

        $data = Product::query();

        if($request->has('search') && $request->search != ''){
        
            $data->where('title','LIKE',"%{$request->search}%")
            ->orWhere('slug', 'LIKE', "%{$request->search}%") 
            ->orWhere('sku', 'LIKE', "%{$request->search}%")
            ->orWhere('details', 'LIKE', "%{$request->search}%")
            ->orWhere('description', 'LIKE', "%{$request->search}%") 
            ->orWhere('meta_title', 'LIKE', "%{$request->search}%") 
            ->orWhere('meta_description', 'LIKE', "%{$request->searchm}%") 
            ->orWhere('meta_keywords', 'LIKE', "%{$request->search}%"); 
        }
        
        if ($request->has('sort')) {
            $sortBy = $request->input('sort');
            if ($sortBy == 'ascending') {
                $data->orderBy('title', 'asc');
            } elseif ($sortBy == 'descending') {
                $data->orderBy('title', 'desc');
            } elseif ($sortBy == 'low_to_high') {
                $data->orderBy('price', 'asc');
            }elseif ($sortBy == 'high_to_low') {
                $data->orderBy('price', 'desc');
            }
        }
        


        if($request->has('category') && $request->category != ''){
           $category = Category::where('slug',$request->category)->first(); 
           if(!$category){
             return back();
            }
            $data = $data->where('category_id',$category->id);
        }

        
        if($request->has('collection') && $request->collection != ''){
            $collection = Collection::where('slug',$request->collection)->first(); 
            if(!$collection){
              return back();
             }

                $ProductCollection = ProductCollection::where('collection_id',$collection->id)->get()->pluck('product_id');
                $data = $data->whereIn('id',$ProductCollection);
            
        }
        
        
        $data = $data->paginate(10);
        $categories = Category::with('children.children')->where('parent_id', NULL)->get();
        $collections = Collection::where('is_enable',1)->get();

        return view('theme.shop',compact('data','categories','collections'));
    }


    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category($id)
    {

        $category = Category::where('slug',$id)->first(); 
        if(!$category){
          return back();
        }
        $categories = Category::where('parent_id',$category->id)->get(); 
        return view('theme.category',compact('category','categories'));

    }
    public function pageContent($slug){
        $pageData = Page::where('slug', $slug)->first();
        if(!$pageData){  
            return back()->with('error', 'Record Not Found');
        }
    
        return view('theme.page', compact('pageData'));
    }
    public function test(){
        Mail::send('theme.emails.order-confirmation-email',[], function($message){
           
            $message->to("supermanman0300@gmail.com");
            $message->subject('Order Receipt - ' . '[ID]');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        
        });
        
    }

      
}
