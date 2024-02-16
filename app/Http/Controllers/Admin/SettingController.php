<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\StoreCategory;
use App\Models\Store;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;


class SettingController extends Controller
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
    public function edit(Request $request)
    {
        $group = $request->group;
        $data = Setting::where('grouping',$request->group)->orderBy('sort')->get();
        return view('admin.settings.edit',compact('data','group'));
    }



     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function update(Request $request)
    {

        // if($request->has('file')){
        //     dd($request->has('file'));
        // }

        // dd($request->all());

        

        foreach ($request->all() as $key => $value) {
            if(isset($value['value'])){

                if(in_array($value['type'],['text','textarea','keywords'])){
                     Setting::where('field',$key)->update(["value" => $value['value']]);
                }

                if($value['type'] == 'image'){
                    $filename = 'settings_'.$key.'_'.uniqid().'.'.$value['value']->getClientOriginalExtension();
                    $value['value']->move(public_path('admin/uploads'), $filename);
                    Setting::where('field',$key)->update(["value" => $filename]);
                }
               
            }
        }

        

        return back()->with('success','Record Updated');
    }
  
}