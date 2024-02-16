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
                EDIT YOUR STORES CATEGORIES
            </header>
           
        </section>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">Fill this Form & Edit Your Stores Categories</header>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{URL::to('admin/storecategories/update/'.Crypt::encryptString($module->id))}}" >
                    @csrf
                    <div class="container-fluid">
                      <div class="row">

                        <div class="col-md-12">
                           <div class="form-group">
                               <label>Title</label>
                               <input type="text" class="title form-control" placeholder="Title" name="title" value="{{$module->title}}" >
                               @if($errors->has('title'))
                                <p class="error" >{{ $errors->first('title') }}</p>
                                @endif          
                           </div>
                        </div>

                        <div class="col-md-12">
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
                               <label>Image</label>
                               <div class="col-lg-12">
                                   <div class="">
                                       <input class="d-block pb-3" type="file" name="image" class="" />
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
                            <input type="text" value="{{$module->alt}}" class="form-control" placeholder="Image alt" name="alt" >
                            @if($errors->has('alt'))
                             <p class="error" >{{ $errors->first('alt') }}</p>
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
<script>
    $(document).ready(function () {
        $('.title').change(function (e) { 
            $('.slug').val($(this).val().toLowerCase()
            .replace(/\s+/g, '-') 
            .replace(/[^\w-]+/g, '')
            .replace(/--+/g, '-'))            
        }).change();
    });
</script>
@endsection