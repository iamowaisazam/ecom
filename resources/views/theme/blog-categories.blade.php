@extends('theme.layout')
@php
     $bg = asset('admin/uploads/'.$global_d['blog_banner']);
@endphp

@section('metatags')
  <title>{{$category->title}}</title>
  <meta name="description" content="{{$category->meta_description}}">
  <meta name="keywords" content="{{$category->meta_keywords}}">
@endsection

@section('css')
<style>
      #banner-nin {
          background: url("{{$bg}}")!important;
      }

      .blog_image{
        width: 600px;
    }

    .content{
      padding-top: 19px!important;

    }

    .news-section-details img{
        width: 100%;
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
          <h2>Well Come in <span>{{$global_d['site_title'] ?? ''}}</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /#Banner --> 


<section id="news-section-1" class="news-section-details property-details padding_top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 bottom40" style="margin-top: 40px;">
        <h2 class="text-uppercase">{{$category->title}}</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
      </div>
    </div>

    <div class="row">
       
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">

                @foreach ($blogs as $item)
                <div class="col-md-4">
                    <div class="latest_page_box">
                        <div class="news_image">
                            <img src="{{asset('/admin/uploads/'.$item->image)}}" />
                            <div class="price">
                                <span class="tag_red">{{$item->cat_title}}</span>
                            </div>
                        </div>
                        <div class="news_padding">
                            <h3>{{$item->title}}</h3>
                            <p>{{substr($item->short_des, 0,50)}}</p> <br>
                            <a class="d-block btn_fill" href="{{URL::to('/blogs/'.$item->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="paginate text-center">
                {{ $blogs->links('pagination.custom') }}
            </div>

    
        </div>
      
      </div>
  </div>
</section>




@endsection
@section('js')

@endsection