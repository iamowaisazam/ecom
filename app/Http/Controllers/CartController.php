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
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class CartController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        

    }


      /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {

     
        return view('theme.cart');
    }

     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_to_cart(Request $request)
    {

        $sku = $request->sku;
        $sku = Variation::where('id',$sku)->first();
        if(!$sku){
            return response()->json(["message" => "Sku Not Found Product"],400);
        }


        $action = $request->action;
        $quantity = $request->quantity ? intval($request->quantity) : 1;

        $cart = session()->get('cart', []);
            
        if(isset($cart[$sku->id])) {
            

                    $old_qty = $cart[$sku->id]['quantity'];

                    // dd($old_qty);
            
                    if($action == 'increament'){
                        $cart[$sku->id]['quantity'] = $old_qty + $quantity;
                    }elseif($action == 'decreament'){
                        $cart[$sku->id]['quantity'] = $old_qty - $quantity;
                    }else{
                        $cart[$sku->id]['quantity'] = $quantity;
                    }
                    
                    if($cart[$sku->id]['quantity'] <= 0){
                        unset($cart[$sku->id]);
                    }

        } else {

        
            $values = Value::whereIn('id',$request->attr)->get()->pluck('id')->toArray();
            if(count($values) == 0){
                return response()->json(["message" => "Attributes Not Found"],200);
            }
            $cart[$sku->id] = [
                "sku" => $sku->id,
                "quantity" => intval($quantity),
                "attributes" => $values,
            ];
           

        }


        session()->put('cart', $cart);

            return response()->json(["message" => "Product Added In Cart"],200);       
            
    }




    public function get_cart_details(Request $request){

        // session()->put('cart', []);

        $total = 0;
        $cart_items = [];   
        $cart = session()->get('cart', []);
        //  dd($cart);
       
        foreach ($cart as $key => $c) {
            
            $products = Variation::select([
                'products.id',
                'products.title',
                'products.slug',
                'variations.id as variation_id',
                'variations.sku as sku',
                'filemanager.path as image',
                'variations.quantity as quantity',
                'variations.price'
            ])
            ->join('products','products.id','=','variations.product_id')
            ->join('filemanager','filemanager.id','=','variations.image')
            ->where('variations.id',$c['sku'])
            ->first()
            ->toArray();

            $attributes = [];
           if($c['attributes']){
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
           }

           
           $total += $products['price'] * $c['quantity']; 

           array_push($cart_items,[
              "id" => Crypt::encryptString($products['id']),
              "title" => $products['title'],
              "sku" => $c['sku'],
              "slug" => $products['slug'],
              "variation_id" => $products['variation_id'],
              "image" => asset($products['image']),
              "quantity" => $products['quantity'],
              "price" => $products['price'],
              "total" => $products['price'] * $c['quantity'],
              "cart_qty" => $c['quantity'],
              "link" => URL::to('/products').'/'.$products['slug'],
              "remove" => URL::to('/cart/remove/').'/'.$products['variation_id'],
              "attributes" => $attributes,
           ]);

          

        }

        return response()->json([
            'currency' => 'PKR',
            'total' => number_format($total,2),
            'cart_items' => $cart_items
        ],200);
    
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart_remove($id)
    { 

        // $id = Crypt::decryptString($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(["message" => "Item Removed From Cart"],200);

    }

       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart_clear()
    { 

        session()->put('cart', []);
        return back()->with('success','Cart Empty');

    }

    


    



}