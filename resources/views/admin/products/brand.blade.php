<section class="card">
    <header class="card-header bg-info">
        <h4 class="mb-0 text-white">Select Brand</h4>
    </header>
    <div class="card-body">        
            <div class="form-group">
                <select name="brand_id" class="form-control" >
                    @foreach ($brands as $brand)
                    <option @if($product->brand_id == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->title}}</option>
                    @endforeach
                </select>
                @if($errors->has('brand_id'))
                 <p class="invalid-feedback" >{{ $errors->first('brand_id') }}</p>
                @endif 
            </div>
    </div>
</section>