@extends('admin.layout')
@section('css')
 
<style>
    .title{
        margin: 0 0 5px 0;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 20px;
        color: black;
    }
</style>

@endsection
@section('content')

<div class="row">
               
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <!--widget start-->
                <section class="card">
                    <div class="twt-feed blue-bg">
                        <h1>{{$module->title}}</h1>
                        <p>{{ ucwords(str_ireplace("_", " ",$module->heading))}}</p>
                        <a target="_blank" href="{{asset('/admin/uploads/store/'.$module->image)}}">
                            <img src="{{asset('/admin/uploads/store/'.$module->image)}}" />
                        </a>
                    </div>
                    <div class="weather-category twt-category">
                        <ul>
                            <li class="active">
                                <h5>STORE CATEGORY</h5>
                               <span>{{$category->title}}</span> 
                            </li>
                            <li>
                                <h5>TRACKING URL</h5>
                                <span>{{$module->tracking_url}}</span> 
                            </li>
                            <li>
                                <h5>DIRECT URL</h5>
                                <span>{{$module->direct_url}}</span> 
                            </li>
                            <li>
                                <h5>META TITLE</h5>
                                <span>{{$module->meta_title}}</span> 
                            </li>
                            <li>
                                <h5>META DESCRIPTION</h5>
                                <span>{{$module->meta_description}}</span> 
                            </li>
                            <li>
                                <h5>META KEYWORDS</h5>
                                <span>{{$module->meta_keywords}}</span> 
                            </li>
                        </ul>
                        <div class="twt-write col-sm-12">
                            <h5 class="title" >Short Description:</h5>
                            <div class="area">
                                {!! $module->short_des !!}
                            </div>
                           
                        </div>
                        <div class="twt-write col-sm-12">
                            <h5 class="title" >Long Description:</h5>
                            <div class="area">
                           {!! $module->long_des !!}
                            </div>
                        </div>
                    </div>
                   
                    <footer class="twt-footer">
                        <div class=" hidden-phone">
                            
                            <button class="btn btn-primary btn-lg fa fa-pencil"></button>
                            <button class="btn btn-danger btn-lg fa fa-trash-o"></button>
                        </div>
                      
                    </footer>
                </section>
                <!--widget end-->
            </div>
           
        </div>
     
    </div>

</div>

@endsection

@section('js')


    
@endsection