@extends('promotions.layout')

<?php 
    $bg = asset('admin/uploads/'.$global_d['store_banner']);
?>


@section('metatags')
    <title>{{$global_d['store_meta_tags'] ?? ''}}</title>
    <meta name="description" content="{{$global_d['store_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['store_keywords'] ?? ''}}">
@endsection

@section('css')

    <style>
        #banner-nin {
        background: url("{{$bg}}")!important;
        }
        .latest_page_box img{
            width: 100%;
        }

        .title{
            padding: 48px 0px;
        }

        .latest_page_box {
        border: 1px solid #e3e3e3;
        border-radius: 5px;
        margin-bottom: 50px;
        }
    </style>

@endsection

@section('content')

<!-- Banner -->
<section id="banner-nin" class="parallaxie">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="banner_detail">
            <h2>{!!$global_d['store_banner_title']!!}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /#Banner --> 
 


<div class="top_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title text-center" >TODAY`S TOP DEALS AND COUPONS</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $item)
       
           
            <div class="col-md-4">
                <div style="cursor: pointer" data-toggle="modal" data-target="#myModal{{$item->id}}" class="latest_page_box">
                    <div class="news_image">
                        <img class="img-fluid" alt="{{$item->alt}}" src="{{asset('admin/uploads/'.$item->image)}}">
                        <div class="price">
                            <span class="tag_red">Coupon</span>
                        </div>
                    </div>
                    <div class="news_padding">
                        <h3>{{$item->offer_name}}</h3>
                        <p>
                            <span style="color: rgb(121, 121, 121);">Expires On :</span>
                            <span>{{$item->expiry}}</span>
                        </p>
                         <br>
                         <div class="text-center">
                            <a class="d-block btn_fill" >Active</a>
                         </div>
                        
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
   
</div>



@endsection
