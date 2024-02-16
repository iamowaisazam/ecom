<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\StoreCategory;
use App\Models\Store;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;




class StoreCategoryController extends Controller
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
    public function index()
    {
        $data = StoreCategory::all();  
        return view('admin.storecategories.index',compact('data'));
    }

    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.storecategories.create');
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
            'slug' => 'required|unique:store_categories,slug|max:255',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

    
        $module = StoreCategory::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'alt' => $request->alt,
        ]);

        if($request->hasFile('image')){
            $filename = 'store_category_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }
        
        return redirect('/admin/storecategories/index')->with('success','Record Created Success'); 
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        $module = StoreCategory::find(Crypt::decryptString($id));
        if($module == false){  
            return back()->with('error','Record Not Found');
         }

        return view('admin.storecategories.edit',compact('module'));
    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function update(Request $request,$id)
    {
        // dd('test');
        $id = Crypt::decryptString($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'alt' => 'max:255',
            'slug' => 
                [
                    'required',
                    'max:255',
                    Rule::unique('store_categories')->ignore($id),
                ],
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = StoreCategory::find($id);
        if($module == false){  
           return back()->with('error','Record Not Found');
        }

        $module->title = $request->title;
        $module->slug = $request->slug;
        $module->alt = $request->alt;
        $module->created_at = Carbon::now();


        if($request->hasFile('image')){
            $filename = 'store_category_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
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
    public function delete($id)
    {
        $id= Crypt::decryptString($id);
        $module = StoreCategory::find($id);

        if($module == false){
            return back()->with('warning','Record Not Found');
        }else{

            $store = Store::where('category_id',$id)->get();
            if(count($store) > 0){
                return back()->with('warning','Can Not Delete This Record.This Record Used Somewhere.');
            }

            if (file_exists(public_path('admin/uploads/'.$module->image))) {
                unlink(public_path('admin/uploads/'.$module->image));
            } 

            $module->delete();
            return redirect('/admin/storecategories/index')->with('success','Record Deleted Success'); 
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
        $module = StoreCategory::find($id);
        if($module == false){
            return back()->with('warning','Record Not Found');
        }

        if($module->is_enable == 1){
            $module->is_enable = 0;
        }else{
            $module->is_enable = 1;
        }

        $module->save();
        return redirect('/admin/storecategories/index')->with('success','Record Updated Success');

    }

   
}
