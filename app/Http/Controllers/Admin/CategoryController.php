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

class CategoryController extends Controller
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

            $query = ProductCategory::Query();

            //Search
            $search = $request->get('search')['value'];
            if($search != ""){
               $query = $query->where(function ($s) use($search) {
                   $s->where('product_categories.title','like','%'.$search.'%')
                   ->orwhere('product_categories.slug','like','%'.$search.'%');
               });
            }

    
            $count = $query->get();

            $records = $query->skip($request->start)
            ->take($request->length)
            ->get();
            
            $data = [];
            foreach ($records as $key => $value) {

                $is_enable = $value->is_enable ? 'checked' : '';
                $is_featured = $value->is_featured ? 'checked' : '';

                if($value->parent_id != 0){
                  $category = ProductCategory::where('id',$value->parent_id)->first();
                  if($category){
                    $category = $category->title;
                  }else{
                    $category = "None";
                  }
                }else{
                    $category = "None";
                }

                $action = '<div class="btn-group">';

                $action .= '<a class="btn btn-info" href="'.URL::to('admin/categories/edit/'.Crypt::encryptString($value->id)).'">Edit</a>';
                $action .= '<a class="btn btn-danger" href="'.URL::to('admin/categories/delete/'.Crypt::encryptString($value->id)).'">Delete</a>';

                $action .= '</div>';
                $img = $value->img ? $value->img->preview : '';

                array_push($data,[
                    $value->id,
                   "<img style='width:50px;' src='".$img."' />",
                    $value->title,
                    $value->slug,
                    $category,
                    '<div class="switchery-demo m-b-30">
                    <input data-id="'.Crypt::encryptString($value->id).'" '.$is_enable.' type="checkbox"  class="is_enable js-switch" data-color="#009efb"/></div>',
                    '<div class="switchery-demo m-b-30">
                    <input data-id="'.Crypt::encryptString($value->id).'" '.$is_featured.' type="checkbox"  class="is_featured js-switch" data-color="#009efb"/></div>',
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
              
        return view('admin.categories.index');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        $categories = ProductCategory::where('parent_id',0)->get();
        return view('admin.categories.create',compact('categories'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(),[
            "title" => 'required|max:255',
            'slug' => [
              'required',
              'max:255',
              Rule::unique('product_categories'),
            ],
            "parent_id" => 'integer|required',
            "details" => 'max:500',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $ProductCategory = ProductCategory::create([
            'title' => $request->title,
            "slug" => $request->slug,
            "image" => $request->image,
            "sort" => $request->sort,
            "level" => $request->parent_id == 0 ? 1 : 2,
            "parent_id" => $request->parent_id,
            "details" => $request->details,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect('/admin/categories/index')->with('success','Record Created Success'); 

    }

   

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        
        $id = Crypt::decryptString($id);
        $model = ProductCategory::find($id);
        if($model == false){  
            return back()->with('error','Record Not Found');
         }

         $categories = ProductCategory::where('id','!=',$id)
         ->where('parent_id',0)
         ->get();

        return view('admin.categories.edit',compact('categories','model'));
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
            'slug' => [
                'required',
                'max:255',
                Rule::unique('products')->ignore($id),
            ],
            "details" => 'max:500',
            "description" => 'max:9000',
            "parent_id" => 'integer|required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = ProductCategory::find($id);
        if($product == false){  
           return back()->with('error','Record Not Found');
        }


        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->details = $request->details;
        $product->image = $request->image;
        $product->parent_id = $request->parent_id;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->sort = $request->sort;
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
        $data = ProductCategory::find(Crypt::decryptString($id));
        if($data == false){
            return back()->with('warning','Record Not Found');
        }else{

            $category = ProductCategory::where('parent_id',$data->id)->get();
            if(count($category) > 0){
                return back()->with('warning','This Category Used As Parent Category');
            }

            $product = Product::where('category_id',$data->id)->get();
            if(count($product) > 0){
                return back()->with('warning','This Category Used In Products');
            }


            $data->delete();
            return redirect('/admin/categories/index')->with('success','Record Deleted Success'); 
        }

    }

    

 
    

  


    



    
}
