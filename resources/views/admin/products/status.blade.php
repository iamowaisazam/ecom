<section class="card">
    <header class="card-header bg-info">
        <h4 class="mb-0 text-white">Status</h4>
    </header>
    <div class="card-body">       
                
                <div class="form-group my-2" > 
                    <label class="form-label" for="">Type</label>
                    <select class="type form-control" name="type">
                        <option @if($product->type == 'single') selected @endif value="single">Single</option>
                        <option @if($product->type == 'variation') selected @endif value="variation">Variation</option>
                    </select>
                </div>

                <div class="form-group my-2" > 
                    <label class="form-label" for="">Is Approved</label>
                    <select class="form-control" name="is_enable">
                        <option @if($product->is_enable == 1) selected @endif value="1">Yes</option>
                        <option @if($product->is_enable == 0) selected @endif value="0">No</option>
                    </select>
                </div>

                <div class="form-group my-2" > 
                    <label class="form-label" for="">Is Featured</label>
                    <select class="form-control" name="is_featured">
                        <option @if($product->is_enable == 1) selected @endif value="1">Yes</option>
                        <option @if($product->is_enable == 0) selected @endif value="0">No</option>
                    </select>
                </div>                                
    </div>
</section>