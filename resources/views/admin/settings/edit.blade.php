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
                EDIT YOUR {{ ucwords(str_ireplace("_", " ",$group))}}
            </header>
           
        </section>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="card">            
            <header class="card-header">Fill this Form & Edit {{ ucwords(str_ireplace("_", " ",$group))}}</header>
            <div class="card-body">
                <form method="post" 
                enctype="multipart/form-data" 
                action="{{URL::to('admin/settings/update/')}}" >
                    @csrf
                    <div class="row">
                        @foreach ($data as $key => $item)
                        @switch($item->type)
                            @case('keywords')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ ucwords(str_ireplace("_", " ",$item->field))}}</label>
                                    <input 
                                      id="tagsinput" 
                                      class="tagsinput"
                                      type="text" 
                                      value="{{$item->value}}"  
                                      placeholder="{{ ucwords(str_ireplace("_", " ",$item->field))}}" 
                                      name="[fields][{{$key}}]{{$item->field}}" >
                                            
                                </div>
                            </div>
                            @break
                            

                            @case('image')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ ucwords(str_ireplace("_", " ",$item->field))}} :</label>
                                    <input 
                                      class="image"
                                      type="file" 
                                      value="{{$item->value}}"  
                                      placeholder="{{ ucwords(str_ireplace("_", " ",$item->field))}}" 
                                      name="{{$item->field}}[value]" >
                                      <input type="hidden" name="{{$item->field}}[type]"
                                      value="{{$item->type}}" >
                                      <br>

                                      <img style="width:100px;height:100px;" src="{{asset('/admin/uploads/')}}/{{$item->value}}" />
                                </div>
                            </div>
                            @break

                            @case('textarea')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ ucwords(str_ireplace("_", " ",$item->field))}}</label>
                                    <textarea class="summernote form-control"  
                                      placeholder="{{ ucwords(str_ireplace("_", " ",$item->field))}}" 
                                      name="{{$item->field}}[value]">{!!$item->value!!}</textarea>
                                      <input type="hidden" name="{{$item->field}}[type]"
                                      value="{{$item->type}}" >
                                </div>
                            </div>
                            @break

                            @default
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ ucwords(str_ireplace("_", " ",$item->field))}}</label>
                                    <input 
                                      type="text" 
                                      value="{{$item->value}}" 
                                      class="form-control" 
                                      placeholder="{{ ucwords(str_ireplace("_", " ",$item->field))}}" 
                                      
                                      name="{{$item->field}}[value]" >
                                      
                                      <input type="hidden" name="{{$item->field}}[type]"
                                      value="{{$item->type}}" >
                                             
                                </div>
                            </div>      
                          @endswitch
                        
                        @endforeach
            
                        <div class="col-md-12 text-center pt-5">
                            <button type="submit" class="btn btn-primary">Update</button>
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