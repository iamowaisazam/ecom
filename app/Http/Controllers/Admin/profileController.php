<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Storage;
class profileController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::user()->id;
        // echo $id  ;
        $user = User::find($id);
        if($user == false){  
            return back()->with('error','Record Not Found');
         }

        return view('admin.profile',compact('user'));
    }
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'files.*' => 'required|file|max:2048', 
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => 'nullable|string|min:8|max:255',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        if($user == false){  
           return back()->with('error','Record Not Found');
        }
       
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                
                $filename = uniqid() . '_' . $file->getClientOriginalName();
        
                // dd($filename);
                Storage::putFileAs('public/profile', $file, $filename);
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->created_by = Auth::user()->id;
        $user->created_at = Carbon::now();

        if($request->password){
          $user->password =  Hash::make($request->password);
        }

        if($request->has('permissions')){
            $user->permissions =  implode(',',$request->permissions);
        }else{
            $user->permissions =  NULL;
        }

        $user->save();
        return back()->with('success','Record Updated');

    }
    
}
