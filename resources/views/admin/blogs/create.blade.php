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
                CREATE YOUR BLOGS
            </header>
           
        </section>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="card">            
            <header class="card-header">Fill this Form & Create Your Blogs</header>
            <div class="card-body">
                <form method="post" 
                enctype="multipart/form-data" 
                action="{{URL::to('admin/blogs/store/')}}" >
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Your Category</label>
                                <select name="category_id" class="form-control form-control-lg mb-2">
                                   @foreach ($blogCategory as $item)
                                    <option @if(old('category_id') == $item->id) selected @endif
                                        value="{{Crypt::encryptString($item->id)}}" >{{$item->title}}</option>
                                   @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                      <p class="error" >{{ $errors->first('category_id') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"  value="{{old('title')}}" class="title form-control" placeholder="Title" name="title" >
                                @if($errors->has('title'))
                                 <p class="error" >{{ $errors->first('title') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text"  value="{{old('slug')}}" class="slug form-control" placeholder="Slug" name="slug" >
                                @if($errors->has('slug'))
                                 <p class="error" >{{ $errors->first('slug') }}</p>
                                 @endif          
                            </div>
                         </div>

                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="col-lg-12">
                                    <div class="">
                                        <input type="file" name="image" class="d-block pb-3" />
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
                                <input type="text"  value="{{old('alt')}}" class="form-control" placeholder="Image Alt" name="alt" >
                                @if($errors->has('alt'))
                                 <p class="error" >{{ $errors->first('alt') }}</p>
                                 @endif          
                            </div>
                         </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner</label>
                                <div class="col-lg-12">
                                    <div class="">
                                        <input type="file" name="banner" class="d-block pb-3" />
                                        @if($errors->has('banner'))
                                           <p class="error" >{{ $errors->first('banner') }}</p>
                                        @endif 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner Alt</label>
                                <input type="text"  value="{{old('banner_alt')}}" class="form-control" placeholder="Banner Alt" name="banner_alt" >
                                @if($errors->has('banner_alt'))
                                 <p class="error" >{{ $errors->first('banner_alt') }}</p>
                                 @endif          
                            </div>
                         </div>

                         <div class="col-md-12">
                            <section class="card">
                                <header class="card-header head-border">Short Description</header>
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
                                <header class="card-header head-border">Long Description</header>
                                <div class="card-body">
                                    <textarea class="summernote" name="long_des">{{old('long_des')}}</textarea>
                                </div>
                                @if($errors->has('long_des'))
                                  <p class="error" >{{ $errors->first('long_des') }}</p>
                                 @endif 
                            </section>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sorting</label>
                                <input type="number" value="{{old('sort')}}" name="sort" 
                                class="form-control"
                                placeholder="Sorting">
                                @if($errors->has('sort'))
                                    <p class="error" >{{ $errors->first('sort') }}</p>
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

                        <div class="col-md-12">
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
                                <input id="tagsinput" class="tagsinput" value="{{old('meta_keywords')}}" type="text" name="meta_keywords"   
                                placeholder="Meta Description">
                                @if($errors->has('meta_keywords'))
                                   <p class="error" >{{ $errors->first('meta_keywords') }}</p>
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

        $('.title').change(function (e) { 
            $('.slug').val($(this).val().toLowerCase()
            .replace(/\s+/g, '-') 
            .replace(/[^\w-]+/g, '')
            .replace(/--+/g, '-'))            
        }).change();


    
        // Tags Input
        $(".tagsinput").tagsInput();


    });

</script>
    
@endsection