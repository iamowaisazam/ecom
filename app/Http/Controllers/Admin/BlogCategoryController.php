<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\BlogCategory;
use App\Models\Store;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;




class HomeController extends Controller
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
        $data = BlogCategory::query()->orderBy('sort')->get();  
        return view('admin.blogcategories.index',compact('data'));
    }

    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.blogcategories.create');
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
            'slug' => 'required|unique:blog_categories,slug|max:255',
            'sort' =>  'integer',
            'meta_title' =>  'max:255',
            'alt' =>  'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

    
        $module = BlogCategory::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'sort' => $request->sort,
            'alt' => $request->alt,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        if($request->hasFile('image')){
            $filename = 'blog_category_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }
        
        return redirect('/admin/blogcategories/index')->with('success','Record Created Success'); 
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        $module = BlogCategory::find(Crypt::decryptString($id));
        if($module == false){  
            return back()->with('error','Record Not Found');
         }

        return view('admin.blogcategories.edit',compact('module'));
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
                    Rule::unique('blog_categories')->ignore($id),
                ],
            'sort' =>  'integer',
            'meta_title' =>  'max:255',
            'alt' =>  'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = BlogCategory::find($id);
        if($module == false){  
           return back()->with('error','Record Not Found');
        }

        $module->title = $request->title;
        $module->slug = $request->slug;
        $module->sort = $request->sort;
        $module->alt = $request->alt;
        $module->meta_title = $request->meta_title;
        $module->meta_description = $request->meta_description;
        $module->meta_keywords = $request->meta_keywords;
        $module->created_at = Carbon::now();


        if($request->hasFile('image')){
            $filename = 'blog_category_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
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
        $module = BlogCategory::find($id);
        if($module == false){
            return back()->with('warning','Record Not Found');
        }else{

            $store = Store::where('category_id',$id)->get();
            if(count($store) > 0){
                return back()->with('warning','Can Not Delete This Record.This Record Used Somewhere.');
            }

            if (file_exists(public_path('admin/uploads/'.$store[0]->image))) {
                unlink(public_path('admin/uploads/'.$store[0]->image));
            } 

            $module->delete();
            return redirect('/admin/blogcategories/index')->with('success','Record Deleted Success'); 
        }

    }

   

   
}
