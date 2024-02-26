@extends('admin.layout')
@section('css')
<link href="{{asset('admin/assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
<style>

    .invalid-feedback{
      display: block;
   }

   .form-group {
    margin-bottom: 10px;
   }


   .ck-editor__editable_inline {
    min-height: 200px;
   }

</style>
<link href="{{asset('admin/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">ADD YOUR PRODUCT 
        </h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <form method="post" action="{{URL::to('admin/products/store')}}" >
            @csrf

            <div class="row">
                <div class="col-md-9">

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white" >General Details</h4>
                        </header>
                        <div class="card-body">
                            
                                <div class="form-group">
                                    <label class="form-label" >Title</label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control" 
                                    placeholder="Title">
                                    @if($errors->has('title'))
                                     <p class="invalid-feedback" >{{ $errors->first('title') }}</p>
                                    @endif 
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label" >Slug</label>
                                    <input type="text" value="{{old('slug')}}" name="slug" class="form-control" 
                                    placeholder="Slug">
                                    @if($errors->has('slug'))
                                     <p class="invalid-feedback" >{{ $errors->first('slug') }}</p>
                                    @endif 
                                </div>
            
                          
            
                                <div class="form-group">
                                    <label class="form-label">Details</label>
                                    <textarea placeholder="Details..." class="form-control" name="short_description">{{old('short_description')}}</textarea>
                                    @if($errors->has('short_description'))
                                     <p class="invalid-feedback" >{{ $errors->first('short_description') }}</p>
                                    @endif
                                </div>
              
                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white" >Price And Stock</h4>
                        </header>
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label">Meta Title</label>
                                <input placeholder="Meta Title" type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control" />
                                @if($errors->has('meta_title'))
                                 <p class="invalid-feedback" >{{ $errors->first('meta_title') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <input type="text" placeholder="Meta Description" value="{{old('meta_description')}}" name="meta_description" class="form-control" />
                                @if($errors->has('meta_description'))
                                 <p class="invalid-feedback" >{{ $errors->first('meta_description') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" placeholder="Meta Keywords" value="{{old('meta_keywords')}}" name="meta_keywords" class="form-control" />
                                @if($errors->has('meta_keywords'))
                                 <p class="invalid-feedback" >{{ $errors->first('meta_keywords') }}</p>
                                @endif
                            </div>
            
                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white">Description</h4>
                        </header>
                        <div class="card-body">
                            <div class="editor-container">
                            <textarea id="long_description"  class="form-control" name="long_description">{{old('long_description')}}</textarea>    
                            
                            </div>

                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white" >Seo Details</h4>
                        </header>
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label">Meta Title</label>
                                <input placeholder="Meta Title" type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control" />
                                @if($errors->has('meta_title'))
                                 <p class="invalid-feedback" >{{ $errors->first('meta_title') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <input type="text" placeholder="Meta Description" value="{{old('meta_description')}}" name="meta_description" class="form-control" />
                                @if($errors->has('meta_description'))
                                 <p class="invalid-feedback" >{{ $errors->first('meta_description') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" placeholder="Meta Keywords" value="{{old('meta_keywords')}}" name="meta_keywords" class="form-control" />
                                @if($errors->has('meta_keywords'))
                                 <p class="invalid-feedback" >{{ $errors->first('meta_keywords') }}</p>
                                @endif
                            </div>
            
                        </div>
                    </section>



                    



                </div>
                <div class="col-md-3">

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white">Status</h4>
                        </header>
                        <div class="card-body">        
                                    <div class="form-group my-2" > 
                                        <label class="form-label" for="">Is Approved</label>
                                        <select class="form-control" name="is_enable">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group my-2" > 
                                        <label class="form-label" for="">Is Featured</label>
                                        <select class="form-control" name="featured">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>                                
                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white">Select Category</h4>
                        </header>
                        <div class="card-body">        
                                <div class="form-group">
                                   <select class="form-control" name="category_id" >
                                    @foreach($categories as $category)
                                    <?php  $subcats = $category->children; ?>
                                       <option class="">{{ $category->title }} </option>
                                        @foreach($subcats as $child)
                                          <option class="">---- {{ $child->title }} </option>
                                                @foreach($child->children as $subchild)
                                                <option class="">--------- {{ $subchild->title }} </option>
                                                @endforeach
                                        @endforeach          
                                    @endforeach
                                   </select>
                                    @if($errors->has('category_id'))
                                     <p class="invalid-feedback" >{{ $errors->first('category_id') }}</p>
                                    @endif 
                                </div>
                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white">Select Brand</h4>
                        </header>
                        <div class="card-body">        
                                <div class="form-group">
                                    <select name="brand_id" class="form-control" >
                                        <option value="1">1</option>
                                    </select>
                                    @if($errors->has('brand_id'))
                                     <p class="invalid-feedback" >{{ $errors->first('brand_id') }}</p>
                                    @endif 
                                </div>
                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header bg-info">
                            <h4 class="mb-0 text-white">Tags</h4>
                        </header>
                        <div class="card-body">
                            <div class="tags-default">
                                <input type="text" value="{{old('tags')}}" data-role="tagsinput" placeholder="" /> 
                            </div>
                        </div>
                    </section>
                </div>

            </div>

         <div class="pt-3 form-group row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
         </div>
       </form>
    </div>
</div>
@endsection

@section('js')



<script src="{{asset('admin/assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('admin/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script>
     $(function () {

        ClassicEditor
            .create(document.querySelector('#long_description')).catch(error => {
                console.error(error);
            });
           
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
    });    
</script>
    
@endsection