@extends('admin.layout')
@section('css')
 

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
                EDIT YOUR COUPON
            </header>
           
        </section>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="card">            
            <header class="card-header">Fill this Form & Edit Your Coupon</header>
            <div class="card-body">
                <form method="post" 
                enctype="multipart/form-data" 
                action="{{URL::to('admin/coupons/update/')}}/{{Crypt::encryptString($module->id)}}" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Name</label>
                                <input type="text" value="{{$module->offer_name}}" class="form-control" placeholder="Offer Name" name="offer_name" >
                                @if($errors->has('offer_name'))
                                 <p class="error" >{{ $errors->first('offer_name') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Box</label>
                                <input type="text" value="{{$module->offer_box}}" class="form-control" placeholder="Offer Name" name="offer_box" >
                                @if($errors->has('offer_box'))
                                 <p class="error" >{{ $errors->first('offer_box') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Details</label>
                                <input type="text" value="{{$module->offer_details}}" class="form-control" placeholder="Offer Details" name="offer_details" >
                                @if($errors->has('offer_details'))
                                 <p class="error" >{{ $errors->first('offer_details') }}</p>
                                 @endif          
                            </div>
                         </div>

                        

                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <select name="type" class="type form-control form-control-lg mb-2">
                                    <option @if($module->type == 'code') selected @endif 
                                        value="code">Code</option>
                                    <option @if($module->type == 'active') selected @endif value="active">Active</option>
                                </select> 
                                @if($errors->has('type'))
                                      <p class="error" >{{ $errors->first('type') }}</p>
                                @endif   
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" value="{{$module->code}}" class="code form-control" placeholder="Code" name="code" >
                                @if($errors->has('code'))
                                 <p class="error" >{{ $errors->first('code') }}</p>
                                 @endif          
                            </div>
                         </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Store</label>
                                <select name="store_id" class="store_id form-control form-control-lg mb-2">
                                   @foreach ($stores as $item)
                                   <option data-id="{{$item->direct_url}}" 
                                   @if($module->store_id == $item->id) selected @endif
                                    value="{{Crypt::encryptString($item->id)}}" 
                                    
                                    >{{$item->title}}</option>
                                   @endforeach
                                </select>
                                @if($errors->has('store_id'))
                                      <p class="error" >{{ $errors->first('store_id') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tracking Link</label>
                                <input readonly type="text" value="{{$module->tracking_link}}" class="tracking_link form-control" placeholder="Tracking Link" name="tracking_link" >
                                @if($errors->has('tracking_link'))
                                 <p class="error" >{{ $errors->first('tracking_link') }}</p>
                                 @endif          
                            </div>
                         </div>
                         <?php 
                        //  $timestamp = strtotime($dateString);
                         ?>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Expiry Date</label>
                                <input type="date" 
                                @if($module->expiry != '')
                                value="{{date("Y-m-d",strtotime($module->expiry))}}" 
                                @endif
                                class="form-control" 
                                placeholder="Expiry Date" name="expiry" >
                                @if($errors->has('expiry'))
                                 <p class="error" >{{ $errors->first('expiry') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="col-lg-12">
                                    <div class="">
                                        <input type="file" name="image" class="d-block pb-3" />
                                           <a target="_blank" class="" href="{{asset('/admin/uploads/'.$module->image)}}">
                                            <img style="width: 100px;height:100px" style="width:50px;height:50px" src="{{asset('/admin/uploads/'.$module->image)}}" />
                                           </a>
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
                                <input type="text"  value="{{$module->alt}}" class="form-control" placeholder="Image Alt" name="alt" >
                                @if($errors->has('alt'))
                                 <p class="error" >{{ $errors->first('alt') }}</p>
                                 @endif          
                            </div>
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

<script>
    jQuery(document).ready(function(){

        $('.type').change(function (e) { 
            if($(this).val() == 'code'){
                
                $('.code').parent().parent().show();
            }else{
                $('.code').val('');
                $('.code').parent().parent().hide();
            }   
        }).change();


        $('.store_id').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var dataId = selectedOption.data('id');
            $(".tracking_link").val(dataId);
        }).change();


    });

</script>
    
@endsection