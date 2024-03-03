<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Value;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Variation;
use App\Models\VariationAttribute;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

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

        $attributes = Attribute::with('values')->get()->toArray();

        
        $results = $this->generateAttributeCombinations($attributes);
        // dd($results);

        foreach ($results as $values) {

            $sku = [];
            foreach ($values as $item) {
                array_push($sku,$item['title']);
            }

            $ProductVariation = Variation::create([
                "product_id"=> 3,
                "title" => implode('-',$sku), 
                "sku" => implode('-',$sku),
                "value" => implode('-',$sku) 
            ]);

            foreach ($values as $item) {
                VariationAttribute::create([
                    "variation_id" => $ProductVariation->id,
                    "attribute_id" => $item['attribute_id'],
                    "value_id" => $item['id'],
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
        
      
        $categories = Collection::all();
        $brands = Brand::all();
        $sliders = Slider::where('is_enable',1)->get(); 
        $products = Product::where('is_enable',1)->get();
       
        return view('theme.home',compact('categories','brands','products','sliders'));
    }


     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
        // $id = Crypt::decryptString($id);
        $releated_products = Product::query()->limit(5)->get();

        $product = Product::with(['variations.attributes.values','variations.attributes.attribute'])->where('slug',$id)->first();

        // dd($product->toArray());


        // $variations_id = $product->variations->pluck('id')->toArray();

        // $variations = VariationAttribute::select([
        //     'attributes.id as attribute_id',
        //     'attributes.title',
        //     'variation_attributes.value',
        //     'value_id',
        // ])
        // ->join('attributes','attributes.id','=','variation_attributes.attribute_id')
        // ->whereIn('variation_attributes.variation_id',$variations_id)
        // ->get()
        // ->toArray();

        // dd($product->toArray());
        

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
    public function shop()
    {
    
        $data = Product::paginate(5);
        $categories = Category::with('children.children')->where('parent_id', 0)->get();

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
        $sku = Variation::where('id',$request->sku)->first();

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

  
}
