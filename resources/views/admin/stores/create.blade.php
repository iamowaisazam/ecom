@extends('admin.layout')
@section('css')
 
<link href="{{asset('admin/assets/summernote/summernote-bs4.css')}}" rel="stylesheet">

<style>
 
    .error{
        color:red;
    }
</style>

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-headers">
                ADD YOUR STORES
            </header>
           
        </section>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="card">            
            <header class="card-header">Fill this Form & Create Your Stores</header>
            <div class="card-body">
                <form method="post" 
                enctype="multipart/form-data" 
                action="{{URL::to('admin/stores/store')}}" >
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Your Category</label>
                                <select name="category_id" class="form-control form-control-lg mb-2">
                                    @foreach ($storeCategory as $item)
                                    <option 
                                     @if(old('category_id') == Crypt::encryptString($item->id)) {{'selected'}} @endif 
                                    value="{{Crypt::encryptString($item->id)}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                      <p class="error" >{{ $errors->first('category_id') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Your Store Heading</label>
                                <select name="heading" class="form-control form-control-lg mb-2">
                                    <option value="promo_codes_coupon" >Promo Codes &amp; Coupon </option>
                                    <option value="coupons_promo_codes">Coupons &amp; Promo Codes </option>
                                    <option value="voucher_discount_codes" >Voucher &amp; Discount Codes </option>
                                </select> 
                                @if($errors->has('heading'))
                                      <p class="error" >{{ $errors->first('heading') }}</p>
                                @endif   
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Store Name</label>
                                <input type="text" value="{{old('title')}}" class="title form-control" placeholder="Store Name" name="title" >
                                @if($errors->has('title'))
                                 <p class="error" >{{ $errors->first('title') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" value="{{old('slug')}}" class="slug form-control" placeholder="Slug" name="slug" >
                                @if($errors->has('slug'))
                                 <p class="error" >{{ $errors->first('slug') }}</p>
                                 @endif          
                            </div>
                         </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Store Logo </label>
                                <div class="col-lg-12">
                                    <div class="">
                                        <input type="file" name="image" class="" />
                                        @if($errors->has('image'))
                                           <p class="error" >{{ $errors->first('image') }}</p>
                                        @endif 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image Alt</label>
                                <input type="text" value="{{old('alt')}}" class="form-control" placeholder="Image Alt" name="alt" >
                                @if($errors->has('alt'))
                                 <p class="error" >{{ $errors->first('alt') }}</p>
                                 @endif          
                            </div>
                         </div>

                        
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Direct URL</label>
                                <input type="text" value="{{old('direct_url')}}" class="form-control" placeholder="Direct URL" name="direct_url" >
                                @if($errors->has('direct_url'))
                                 <p class="error" >{{ $errors->first('direct_url') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Tracking URL</label>
                                <input type="text" value="{{old('tracking_url')}}" class="form-control" placeholder="Tracking URL" name="tracking_url" >
                                @if($errors->has('tracking_url'))
                                 <p class="error" >{{ $errors->first('tracking_url') }}</p>
                                 @endif          
                            </div>
                         </div>

                        

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control"
                            placeholder="Meta Title">
                            @if($errors->has('meta_title'))
                                <p class="error" >{{ $errors->first('meta_title') }}</p>
                            @endif 
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input value="{{old('meta_description')}}" type="text" name="meta_description" class="form-control"  
                            placeholder="Meta Description">
                            @if($errors->has('meta_description'))
                               <p class="error" >{{ $errors->first('meta_description') }}</p>
                            @endif 
                        </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meta Keywords</label>
                                <input  id="tagsinput" class="tagsinput" value="{{old('meta_description')}}" type="text" name="meta_keywords" class="form-control"  
                                placeholder="Meta Description">
                                @if($errors->has('meta_keywords'))
                                   <p class="error" >{{ $errors->first('meta_keywords') }}</p>
                                @endif 
                            </div>
                            </div>


                    
                            <div class="col-md-12">
                                <section class="card">
                                    <header class="card-header head-border">
                                        Short Description
                                    </header>
                                    <div class="card-body">
                                        <textarea class="form-control" name="short_des">{{old('short_des')}}</textarea>
                                    </div>
                                    @if($errors->has('short_des'))
                                      <p class="error" >{{ $errors->first('short_des') }}</p>
                                     @endif 
                                </section>
                            </div>
                            <div class="col-md-12">
                                <section class="card">
                                    <header class="card-header head-border">
                                        Long Description
                                    </header>
                                    <div class="card-body">
                                        <textarea class="summernote" name="long_des">{{old('long_des')}}</textarea>
                                    </div>
                                    @if($errors->has('long_des'))
                                      <p class="error" >{{ $errors->first('long_des') }}</p>
                                     @endif 
                                </section>
                            </div>
                        

                        <div class="col-md-12 text-center pt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                      </div>
                </form>       
              </div>
          </section>
        </div>
    </div>
@endsection

@section('js')
<script src="{{asset('admin/js/jquery.tagsinput.js')}}"></script>
<script src="{{asset('admin/assets/summernote/summernote-bs4.min.js')}}"></script>
<script>

    jQuery(document).ready(function(){

        $('.title').change(function (e) { 
            $('.slug').val($(this).val().toLowerCase()
            .replace(/\s+/g, '-') 
            .replace(/[^\w-]+/g, '')
            .replace(/--+/g, '-'))            
        }).change();

        $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
        $(".tagsinput").tagsInput();
    });

</script>
    
@endsection