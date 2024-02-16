@extends('admin.layout')
@section('css')
    
<style>

    .error{
        color:red;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-headers">
                EDIT YOUR BLOG CATEGORIES
            </header>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Fill this Form & Edit Your Blogs Categories
            </header>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{URL::to('admin/blogcategories/update/'.Crypt::encryptString($module->id))}}" >
                    @csrf
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label>Title</label>
                               <input type="text" class="title form-control" placeholder="Title" 
                               name="title" value="{{$module->title}}" >
                               @if($errors->has('title'))
                                <p class="error" >{{ $errors->first('title') }}</p>
                                @endif          
                           </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="slug form-control" placeholder="Slug" name="slug" value="{{$module->slug}}" >
                                @if($errors->has('slug'))
                                 <p class="error" >{{ $errors->first('slug') }}</p>
                                 @endif          
                            </div>
                         </div>

                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Upload Category Image </label>
                               <div class="col-lg-12">
                                   <div class="">
                                       <input class="d-block pb-3" type="file" name="image" class="" />
                                       <a target="_blank" class="" href="{{asset('/admin/uploads/blogcategory/'.$module->image)}}">
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
                            <input type="text" 
                            value="{{$module->alt}}" 
                            name="alt" 
                            class="form-control"
                            placeholder="Image Alt">
                            @if($errors->has('alt'))
                                <p class="error" >{{ $errors->first('alt') }}</p>
                            @endif 
                        </div>
                    </div>

                       <div class="col-md-6">
                        <div class="form-group">
                            <label>Sorting</label>
                            <input type="number" class="form-control" placeholder="Sort" name="sort" value="{{$module->sort}}" >
                            @if($errors->has('sort'))
                             <p class="error" >{{ $errors->first('sort') }}</p>
                             @endif          
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" value="{{$module->meta_title}}" name="meta_title" class="form-control"
                            placeholder="Meta Title">
                            @if($errors->has('meta_title'))
                                <p class="error" >{{ $errors->first('meta_title') }}</p>
                            @endif 
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input value="{{$module->meta_description}}" type="text" name="meta_description" class="form-control"  
                            placeholder="Meta Description">
                            @if($errors->has('meta_description'))
                            <p class="error" >{{ $errors->first('meta_description') }}</p>
                            @endif 
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input id="tagsinput" class="tagsinput" value="{{$module->meta_keywords}}" type="text" name="meta_keywords" class="form-control"  
                            placeholder="Meta Keywords">
                            @if($errors->has('meta_keywords'))
                               <p class="error" >{{ $errors->first('meta_keywords') }}</p>
                            @endif 
                        </div>
                    </div>

                       <div class="col-md-12 text-center pt-5">
                           <button type="submit" class="btn btn-primary">Update</button>
                       </div>
                     </div>
                    </div>
                </form>
            </div>
        </section>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('admin/js/jquery.tagsinput.js')}}"></script>
<script>
    $(document).ready(function () {

        $('.title').change(function (e) { 
            $('.slug').val($(this).val().toLowerCase()
            .replace(/\s+/g, '-') 
            .replace(/[^\w-]+/g, '')
            .replace(/--+/g, '-'))            
        }).change();

        $(".tagsinput").tagsInput();
    });
    
</script>
@endsection