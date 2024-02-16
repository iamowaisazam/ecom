<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;


class BlogController extends Controller
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

        $blogCategory = BlogCategory::where('is_enable',1)->get();
       
        $data = Blog::select([
            'blogs.*',
            'blog_categories.title as category_title',
        ])->join('blog_categories','blog_categories.id','=','blogs.category_id');


        if($request->has('category') && $request->category != ''){
            $data = $data->where('category_id',$request->category);
        }

        $data = $data->get();
        
        return view('admin.blogs.index',compact('data','blogCategory'));
    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        $blogCategory = BlogCategory::where('is_enable',1)->get();
        return view('admin.blogs.create',compact('blogCategory'));
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
            'slug' => 'required|unique:blogs,slug|max:255',
            'category_id' => 'required|max:255',
            'short_des' => 'max:5000',
            'long_des' => 'max:10000',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'banner' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
            'banner_alt' => 'max:255',
            'sort' => 'integer|required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            "category_id" =>Crypt::decryptString($request->category_id),
            'alt' => $request->alt,
            'banner_alt' => $request->banner_alt,
            'sort' => $request->sort,
            "short_des" => $request->short_des,
            "long_des" => $request->long_des,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            "meta_keywords" => $request->meta_keywords,
        ]);

        if($request->hasFile('image')){
            $filename = 'blog_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }

        if($request->hasFile('banner')){
            $filename = 'blog_banner_'.uniqid().'.'.$request->file('banner')->getClientOriginalExtension();
            $request->file('banner')->move(public_path('admin/uploads'), $filename);
            $module->banner = $filename;
            $module->save();
        }
        
        return redirect('/admin/blogs/index')->with('success','Record Created Success'); 
    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        $blogCategory = BlogCategory::where('is_enable',1)->get();
        $module = Blog::find(Crypt::decryptString($id));
        if($module == false){  
            return back()->with('error','Record Not Found');
         }
        return view('admin.blogs.edit',compact('module','blogCategory'));
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
                    Rule::unique('blogs')->ignore($id),
                ],
            'category_id' => 'required|max:255',
            'short_des' => 'max:10000',
            'long_des' => 'max:10000',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'banner' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
            'banner_alt' => 'max:255',
            'sort' => 'integer|required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = Blog::find($id);
        if($module == false){  
           return back()->with('error','Record Not Found');
        }

        $module->title = $request->title;
        $module->slug = $request->slug;
        $module->category_id = Crypt::decryptString($request->category_id); 
        $module->sort = $request->sort;
        $module->banner_alt = $request->banner_alt;
        $module->alt = $request->alt;

        $module->short_des = $request->short_des;
        $module->long_des = $request->long_des;
        $module->meta_title = $request->meta_title;
        $module->meta_description = $request->meta_description;
        $module->meta_keywords = $request->meta_keywords;
        $module->updated_at = Carbon::now();

        if($request->hasFile('image')){
            $filename = 'blog_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }

        if($request->hasFile('banner')){
            $filename = 'blog_banner_'.uniqid().'.'.$request->file('banner')->getClientOriginalExtension();
            $request->file('banner')->move(public_path('admin/uploads'), $filename);
            $module->banner = $filename;
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
        $module = Blog::find(Crypt::decryptString($id));
        if($module == false){
            return back()->with('warning','Record Not Found');
        }
        $category =BlogCategory::find($module->category_id);

        return view('admin.blogs.view',compact('module','category'));

    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function delete($id)
    {
        $module = Blog::find(Crypt::decryptString($id));
       
        if($module == false){
            return back()->with('warning','Record Not Found');
        }else{
            $module->delete();

            if (file_exists(public_path('admin/uploads/'.$module[0]->banner))) {
                unlink(public_path('admin/uploads/'.$module[0]->banner));
            } 

            if (file_exists(public_path('admin/uploads/'.$module[0]->image))) {
                unlink(public_path('admin/uploads/'.$module[0]->image));
            } 

            return redirect('/admin/blogs/index')->with('success','Record Deleted Success'); 
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
        $module = Blog::find($id);

        if($module == false){
            return back()->with('warning','Record Not Found');
        }

        if($module->is_enable == 1){
            $module->is_enable = 0;
        }else{
            $module->is_enable = 1;
        }

        $module->save();
        return redirect('/admin/blogs/index')->with('success','Record Updated Success');

    }

    

   
}
