@extends('promotions.layout')
@php
    $azArray = array();
  for ($i = 97; $i <= 122; $i++) {
      $azArray[chr($i)] = "Value " . chr($i);

  }
@endphp

@section('metatags')
  <title>{{$data->meta_title}}</title>
  <meta name="description" content="{{$data->meta_description}}">
  <meta name="keywords" content="{{$data->meta_keywords}}">
@endsection

@section('css')
  <style>

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

      .paginate{
              padding-bottom: 50px;
          }

      .pager li>span {
          border-radius: 0px!important;
      }

      .active span {
          background: red!important;
          color: white!important;
      }
  </style>
@endsection
@section('content')
<section class="my_pro padding bg-color-gray">
    <div class="container">
      <div class="row property-list-list">
          <div class="col-xs-12 col-sm-3 col-md-3 property-list-list-image">
              <img src="{{asset('/admin/uploads/'.$data->image)}}" alt="recent-properties-1" class="img-responsive">
          </div>
          <div class="col-xs-12 col-sm-8 col-md-8 property-list-list-info">
                <div style="padding-bottom: 10px" class="col-xs-12 col-sm-12 col-md-12">
                  <a href="{{URL::to('/promotions/stores/')}}/{{$data->slug}}">
                    <h3>{{$data->title}}</h3>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <p style="padding-bottom: 5px" >{{$data->short_des}}</p>
                  <a target="_blank" href="{{$data->direct_url}}" target="_blank" >
                    <div class="property_meta margin-t-2 bg-black bottom40" style="width: 40%;">
                      <span><i class="fa fa-arrow-right"></i>VISIT STORE</span>
                    </div>
                  </a>
                </div>
          </div>
      </div>
    </div>
  </section>



  <section id="news-section-1" class="property-details padding_top">
    <div class="container">
      <div class="row">

        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row">
              @foreach ($coupons as $coupon)
                <div class="col-md-4 col-sm-6">
                  <div class="property_item heading_space">
                    <div class="image">
                      <img src="{{asset('admin/uploads/'.$coupon->image)}}" alt="listin" class="img-responsive">
                      <div class="overlay">
                        <div class="centered">
                          <a target="_blank" class="link_arrow white_border" 
                          href="{{$coupon->tracking_link}}">Visit Store</a></div>
                      </div>
                    </div>

                    <div class="proerty_content">
                      <div class="proerty_text">
                        <h3><a >{{$coupon->offer_name}}</a></h3>
                        <span class="bottom10">Expiry Date: {{$coupon->expiry}}</span>
                      
                      </div>
                      <div data-toggle="modal" data-target="#myModal{{$coupon->id}}" class="favroute clearfix" style="cursor: pointer;background-color: #ed2a28;">
                        <p class="pull-left" style="color:#fff; font-size: 16px; font-weight: 700;">Copy Code &amp; visit Store</p>
                      
                      </div>
                    </div>
                  </div>
                </div>

                @component('promotions.components.coupen',['data' => $coupon]) @endcomponent
              @endforeach   
            </div>

            <div class="col-md-12">
              <div style="padding: 30px 0px" class="paginate text-center">
                {{ $coupons->links('pagination.custom') }}
            </div>
            </div>
        </div>


        <div class="col-md-3 col-lg-3"> 
          <div class="blog_info blog-thumbnail">
            <div class="blogimagedescription">
              <h3>Related Store </h3>
            </div>
            <ul class="archieves clearfix">
              @foreach ($related as $r_store)
              <li><a href="{{URL::to('/promotions/stores/')}}/{{$r_store->slug}}">{{$r_store->title}}</a></li>
              @endforeach
              
            </ul>
          </div>      
        </div>
      </div>
    </div>
  </section>
 





@endsection