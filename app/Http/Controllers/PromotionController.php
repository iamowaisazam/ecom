<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Coupon;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $store = Store::query();
        if($request->has('search') && $request->search != ''){
            $store->where('title', 'LIKE', '%' .$request->search . '%');
            $store = $store->limit(10)->get();
        }else{
            $store = [];
        }

       
        return response()->json($store);

    }


   

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function promotions()
    {
        // $category = BlogCategory::where('slug',$id)->first();
        // if($category == false){
        //     return back();
        // }

        $data = Coupon::select([
            'coupons.*',
            'stores.slug',
            'stores.title',
        ])
        ->join('stores','stores.id','=','coupons.store_id')
        ->get();
        
        return view('promotions.index',compact('data'));
    }

      /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function promotions1()
    {
        
        // $category = BlogCategory::where('slug',$id)->first();
        // if($category == false){
        //     return back();
        // }

        $data = Coupon::select([
            'coupons.*',
            'stores.slug',
            'stores.title',
        ])
        ->join('stores','stores.id','=','coupons.store_id')
        ->get();
        
        return view('promotions.index',compact('data'));
    }

    

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function stores()
    {
        
        $data = Store::select([
            'stores.*',
        ])
        // ->where('blogs.category_id',$category->id)
        ->get();
        
        return view('promotions.stores',compact('data'));
    }

     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store($slug)
    {
        
        $data = Store::select([
            'stores.*',
            'stores.slug',
            'stores.title',
        ])
        ->where('stores.slug',$slug)
        ->first();
        if($data == false){
            return back();
        }


        $related = Store::select([
            'stores.*',
        ])
        ->get();

        $coupons = Coupon::select([
            'coupons.*',
        ])
        ->join('stores','stores.id','=','coupons.store_id')
        ->where('coupons.store_id',$data->id)
        ->paginate(6);
        
        return view('promotions.store',compact('data','related','coupons'));

    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categories()
    {
        
        $data = StoreCategory::select([
            'store_categories.*',
        ])
        // ->where('blogs.category_id',$category->id)
        ->get();
        
        return view('promotions.categories',compact('data'));
    }

       /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category($id)
    {

        $category = StoreCategory::where('slug',$id)->first();
        $stores = Store::where('category_id',$category->id)->paginate(3);    

        return view('promotions.category',compact('stores','category'));
    }



    

    
}
