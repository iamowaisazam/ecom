<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;
use App\Models\StoreCategory;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;


class StoreController extends Controller
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

        $storeCategory = StoreCategory::where('is_enable',1)->get();
        $coupons = Coupon::all(); 

        $data = Store::select([
            'stores.*',
            'store_categories.title as category_title',
        ])->join('store_categories','store_categories.id','=','stores.category_id');


        if($request->has('category') && $request->category != ''){
            $data = $data->where('category_id',$request->category);
        }

        $data = $data->get();

        // dd($data);
        
        return view('admin.stores.index',compact('data','storeCategory','coupons'));
    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        $storeCategory = StoreCategory::where('is_enable',1)->get();
        return view('admin.stores.create',compact('storeCategory'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|unique:stores,slug|max:255',
            'category_id' => 'required|max:255',
            'heading' => 'required|max:255',
            'tracking_url' => 'required|unique:stores,tracking_url|max:255',
            'direct_url' => 'required|unique:stores,direct_url|max:255',
            'short_des' => 'max:10000',
            'long_des' => 'max:10000',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = Store::create([
            'title' => $request->title,
            'slug' => $request->slug,
            "category_id" => Crypt::decryptString($request->category_id),
            "heading" => $request->heading,
            "direct_url" => $request->direct_url,
            "tracking_url" => $request->tracking_url,
            "alt" => $request->alt,
            "short_des" => $request->short_des,
            "long_des" => $request->long_des,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            "meta_keywords" => $request->meta_keywords,
        ]);

        if($request->hasFile('image')){
            $filename = 'store_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }
        
        return redirect('/admin/stores/index')->with('success','Record Created Success'); 
    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        $storeCategory = StoreCategory::where('is_enable',1)->get();
        $module = Store::find(Crypt::decryptString($id));
        if($module == false){  
            return back()->with('error','Record Not Found');
         }
        return view('admin.stores.edit',compact('module','storeCategory'));
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
            'title' => 'required|max:255',
            'slug' => 
                [
                    'required',
                    'max:255',
                    Rule::unique('stores')->ignore($id),
                ],
            'category_id' => 'required|max:255',
            'heading' => 'required|max:255',
            'tracking_url' => 
                [
                    'required',
                    'max:255',
                    Rule::unique('stores')->ignore($id),
                ],
            'direct_url' => 
                [
                    'required',
                    'max:255',
                    Rule::unique('stores')->ignore($id),
                ],
            'short_des' => 'max:10000',
            'long_des' => 'max:10000',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = Store::find($id);
        if($module == false){  
           return back()->with('error','Record Not Found');
        }

        $module->title = $request->title;
        $module->slug = $request->slug;
        $module->category_id = Crypt::decryptString($request->category_id); 
        $module->heading = $request->heading;
        $module->direct_url = $request->direct_url;
        $module->tracking_url = $request->tracking_url;
        $module->short_des = $request->short_des;
        $module->long_des = $request->long_des;
        $module->alt = $request->alt;
        $module->meta_title = $request->meta_title;
        $module->meta_description = $request->meta_description;
        $module->meta_keywords = $request->meta_keywords;
        $module->updated_at = Carbon::now();

        if($request->hasFile('image')){
            $filename = 'store_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }

        $module->save();
        return back()->with('success','Record Updated');
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function view($id)
    {
        $module = Store::find(Crypt::decryptString($id));
        if($module == false){
            return back()->with('warning','Record Not Found');
        }
        $category =StoreCategory::find($module->category_id);

        return view('admin.stores.view',compact('module','category'));

    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function delete($id)
    {
        $module = Store::find(Crypt::decryptString($id));
       
        if($module == false){
            return back()->with('warning','Record Not Found');
        }else{
            $module->delete();
            return redirect('/admin/stores/index')->with('success','Record Deleted Success'); 
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function status($id)
    {
        $id = Crypt::decryptString($id);
        $module = Store::find($id);

       
        if($module == false){
            return back()->with('warning','Record Not Found');
        }

        if($module->is_enable == 1){
            $module->is_enable = 0;
        }else{
            $module->is_enable = 1;
        }

        $module->save();
        return redirect('/admin/stores/index')->with('success','Record Updated Success');

    }

    

   
}
