<section class="card">
    <header class="card-header bg-info">
        <h4 class="mb-0 text-white">Image</h4>
    </header>
    <div class="card-body">       
                <div class="form-group my-2" > 
                    <label class="form-label" for="">Thumbnail :</label>
                    <input type="text" value="{{$product->image}}" name="image" class="form-control" 
                        placeholder="Thumbnail">
                        @if($product->get_thumbnail())
                         <img class="pt-3" style="width: 100px" height="100px" src="{{asset($product->get_thumbnail()->path)}}" />
                        @endif
                </div>
                <hr>

                <div class="form-group my-2" > 
                    <label class="form-label" for="">Hover Image :</label>
                    <input type="text" value="{{$product->hover_image}}" name="hover_image" class="form-control" 
                        placeholder="Hover Image">
                        @if($product->get_hover_image())
                         <img class="pt-3" style="width: 100px" height="100px" src="{{asset($product->get_hover_image()->path)}}" />
                        @endif
                </div>
      </div>
</section>