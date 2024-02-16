

<!-- The Modal -->
<div class="modal" id="myModal{{$data->id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{$data->offer_box}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <h3 style="padding-top: 8px;
                    padding-bottom: 15px;" 
                    class="padding-top-20">{{$data->offer_name}}</h3>
                    <div class="block">
                        <img style="width: 100%;" src="{{asset('admin/uploads/'.$data->image)}}" alt="" srcset="" />
                    </div>

                    <div class="button" style="padding-top: 10px" >
                        <a class="btn btn-danger" href="{{URL::to('/promotions/stores/')}}/{{$data->slug}}" target="_blank">VISIT STORE</a>
                    </div>
                    <hr>
                    <h3>No Code Required</h3>
                    <hr>
                    <div class="button" style="padding-top: 10px" >
                        <a class="btn btn-danger" href="{{$data->tracking_link}}" 
                        target="_blank">GO TO STORE</a>
                    </div>

                    

                </div>
               
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>