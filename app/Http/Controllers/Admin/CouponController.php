<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;
use App\Models\StoreCategory;
use App\Models\Coupon;

use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;


class CouponController extends Controller
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
        $stores = Store::where('is_enable',1)->get();
        $data = Coupon::select([
            'coupons.*',
            'stores.title as store_title',
        ])->join('stores','stores.id','=','coupons.store_id');

        if($request->has('store') && $request->store != ''){
            $data = $data->where('coupons.store_id',$request->store);
        }

        $data = $data->get();
        return view('admin.coupons.index',compact('data','stores'));
    }

    
    /**
     * Create a new controller instance.
     * @return void
     */
    public function create()
    {
        $stores = Store::where('is_enable',1)->get();
        return view('admin.coupons.create',compact('stores'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'offer_name' => 'required|max:255',
            'offer_box' => 'required|max:255',
            'offer_details' => 'required|max:255',
            'store_id' => 'required|max:255',
            'tracking_link' => 'required|max:255',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
            'code' => 'max:255',
            'type' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = Coupon::create([
            'offer_name' => $request->offer_name,
            'offer_box' => $request->offer_box,
            'offer_details' => $request->offer_details,
            'tracking_link' => $request->tracking_link,
            'alt' => $request->alt,
            'code' => $request->code,
            'type' => $request->type,
            'store_id' => Crypt::decryptString($request->store_id), 
            'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('image')){
            $filename = 'coupon_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }

        return redirect('/admin/coupons/index')->with('success','Record Created Success'); 
    }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        $id = Crypt::decryptString($id);
        $stores = Store::where('is_enable',1)->get();
       
        $module = Coupon::find($id);
        if($module == false){  
            return back()->with('error','Record Not Found');
         }
        return view('admin.coupons.edit',compact('module','stores'));
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
            'offer_name' => 'required|max:255',
            'offer_box' => 'required|max:255',
            'offer_details' => 'required|max:255',
            'store_id' => 'required|max:255',
            'tracking_link' => 'required|max:255',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',
            'alt' => 'max:255',
            'code' => 'max:255',
            'type' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $module = Coupon::find($id);
        if($module == false){  
           return back()->with('error','Record Not Found');
        }

        $module->offer_name = $request->offer_name;
        $module->offer_box = $request->offer_box;
        $module->offer_details = $request->offer_details;
        $module->tracking_link = $request->tracking_link;
        $module->code = $request->code;
        $module->type = $request->type;
        $module->alt = $request->alt;
        $module->expiry = $request->expiry;
        $module->store_id = Crypt::decryptString($request->store_id); 
        $module->updated_at = Carbon::now();
        $module->save();

        if($request->hasFile('image')){
            $filename = 'coupon_'.uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/uploads'), $filename);
            $module->image = $filename;
            $module->save();
        }

        return back()->with('success','Record Updated');
    }

 

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function delete($id)
    {
        $module = Coupon::find(Crypt::decryptString($id));
       
        if($module == false){
            return back()->with('warning','Record Not Found');
        }else{
            $module->delete();
            return redirect('/admin/coupons/index')->with('success','Record Deleted Success'); 
        }

    }

  


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function sort(Request $request)
    {
        
        $stores = Store::where('is_enable',1)->get();
        $data = Coupon::select([
            'coupons.*',
            'stores.title as store_title',
        ])->join('stores','stores.id','=','coupons.store_id');

        if($request->has('store') && $request->store != ''){
            $data = $data->where('coupons.store_id',$request->store);
        }

        $data = $data->orderBy('sort')->get();
        return view('admin.coupons.sort',compact('data','stores'));
       

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function sort_update(Request $request)
    {
           
        if($request->has('field')){
            foreach ($request->field as $key => $value) {
                Coupon::where('id',intval($value['id']))->update([
                    'sort' => intval($value['key'])
                ]);
            }
        }
        return back()->with('success','Record Updated');
        
    }


    

    

    

   
}
