<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\ProductVariation;
use App\Models\ProductVariationAttribute;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        if($request->ajax()){

            $query = Product::Query();

            //Search
            $search = $request->get('search')['value'];
            if($search != ""){
               $query = $query->where(function ($s) use($search) {
                   $s->where('products.title','like','%'.$search.'%')
                   ->orwhere('products.slug','like','%'.$search.'%')
                   ->orwhere('products.type','like','%'.$search.'%');
               });
            }

            // if($request->has('username') && $request->has('username') != ''){
            //     $query = $query->where('users.name','like','%'.$request->username.'%');
            // }

            // if($request->has('email') && $request->has('email') != ''){
            //     $query = $query->where('users.email','like','%'.$request->email.'%');
            // }

            // if($request->has('role_id') && $request->has('role_id') != '' && $request->has('role_id') != NULL ){
            //     $query = $query->where('users.role_id',$request->role_id);
            // }

            $count = $query->get();

            // if($request->has('order')){
            //     if($request->order[0]['column'] == 1){
            //         $query = $query->orderBy('users.name',$request->order[0]['dir']);
            //     }

            //     if($request->order[0]['column'] == 2){
            //         $query = $query->orderBy('users.email',$request->order[0]['dir']);
            //     }

             

            // }
            
            $records = $query->skip($request->start)
            ->take($request->length)
            ->get();
            
            $data = [];
            foreach ($records as $key => $value) {

                $action = '<div class="btn-group">';

                $action .= '<a class="btn btn-info" href="'.URL::to('admin/products/edit/'.Crypt::encryptString($value->id)).'">Edit</a>';
                $action .= '<a class="btn btn-danger" href="'.URL::to('admin/products/delete/'.Crypt::encryptString($value->id)).'">Delete</a>';

                $action .= '</div>';

                $thumb_path = $value->get_thumbnail() ? $value->get_thumbnail()->path : ''; 
                $img = '<img  style="width:100px;height:50px" src="'.asset($thumb_path).'" />';

                array_push($data,[
                    $value->id,
                    $img,
                    $value->title,
                    $value->slug,
                    $value->price,
                    $value->type,
                    $value->get_category() ? $value->get_category()->title : '-',
                    $value->is_enable ? 'Approved' : 'Pending',
                    $action,
                 ]
                );
                
            }


            return response()->json([
                "draw" => $request->draw,
                "recordsTotal" => count($count),
                "recordsFiltered" => count($count),
                'data'=> $data,
            ]);
        }
        

        $categories = ProductCategory::all();
        
        
        return view('admin.products.index',compact('categories'));
    }

    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {

        $categories = ProductCategory::all();

        return view('admin.products.create',compact('categories'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {

        $product = Product::create([
            'title' => $request->title,
            'type' => $request->type,
            'is_enable' => 0,
        ]);

        
        return redirect('/admin/products/edit/'.Crypt::encryptString($product->id))->with('success','Record Created Success'); 
    }

   

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        
        $id = Crypt::decryptString($id);
        $product = Product::find($id);
        if($product == false){  
            return back()->with('error','Record Not Found');
         }

         $categories = ProductCategory::all();
         $brands = Brand::all();

         $attributes = ProductAttribute::with('values')->get();


        return view('admin.products.edit',compact('product','categories','brands','attributes'));
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function update(Request $request,$id)
    {
        


        $id = Crypt::decryptString($id);

        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            "type" => "required|max:255",
            "details" => 'max:500',
            "description" => 'max:9000',
            "category_id" => 'integer',
            "is_enable" => "integer",
            "is_featured" => "integer",
            
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('products')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::find($id);
        if($product == false){  
           return back()->with('error','Record Not Found');
        }

    
        if($request->has('variation')){
            foreach ($request->variation as $v) {
                ProductVariation::where('id',$v['id'])->update([
                    "sku" => $v['sku'],
                    "quantity" => $v['quantity'],
                    "price" => $v['price'],
                    "image" => $v['thumbnail'],
                ]);
            }
        }


        if($request->has('gallery')){
            $images = explode(',',$product->images);
            $new_images = $request->gallery;
            $merged_images = array_merge($images,$new_images);
            $product->images = implode(',',$merged_images);
        }

        $product->title = $request->title;
        $product->type = $request->type;
        $product->slug = $request->slug;
        $product->details = $request->details;
        $product->description = $request->description;

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->is_featured = $request->is_featured;
        $product->is_enable = $request->is_enable;

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->image = $request->image;
        $product->hover_image = $request->hover_image;

        $product->selling_price = $request->selling_price;
        $product->price = $request->price;

        $product->sku = $request->sku;   
        $product->tags = $request->tags;
        $product->save();

        return back()->with('success','Record Updated');

    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function delete($id)
    {
        $user = User::find(Crypt::decryptString($id));
        if($user == false){
            return back()->with('warning','Record Not Found');
        }else{
            $user->delete();
            return redirect('/admin/users/index')->with('success','Record Deleted Success'); 
        }

    }

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function remove_image(Request $request,$id)
    {
        $id = Crypt::decryptString($id);
        $product = Product::find($id);
        if($product == false){  
           return back()->with('error','Record Not Found');
        }

         $images = explode(',',$product->images); 
         $array_without_strawberries = array_diff($images, array($request->image));
         $product->images = implode(',',$array_without_strawberries);
         $product->save();

        return back()->with('success','Record Removed Success'); 

    }


    /**
     * Create a new controller instance.
     * @return void
     */
    public function remove_variation(Request $request,$id)
    {
        
        ProductVariation::where('id',$id)->delete();
        return back()->with('success','Remove Variation Successfully');
    }


    



    
}
