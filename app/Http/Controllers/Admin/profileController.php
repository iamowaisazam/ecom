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
    
}
