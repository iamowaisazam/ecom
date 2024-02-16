@extends('admin.layout')
@section('css')

    <!--dynamic table-->
    <link href="{{asset('admin/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin/assets/data-tables/DT_bootstrap.css')}}" />

@endsection

@section('content')

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-headers">
                    VIEW YOUR COUPONS DETAILS
                    </header>
                
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-body">
                        <form action="{{URL::to('/admin/coupons/index')}}"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Search Your Store Name</label>
                                        <select name="store" class="form-control form-control-lg mb-2">
                                            <option value="">All</option>
                                            @foreach ($stores as $store)
                                            <option
                                            @if(request()->store == $store->id)
                                            {{'selected'}}
                                            @endif 
                                            value="{{$store->id}}" >{{$store->title}}</option>
                                            @endforeach
                                        </select>      
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Search Your Store</button>
                        </form>
                    </div>
                </section>
            </div>
        
        <!-- page end-->
        </div>

    <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
              <section class="card">
                <header class="card-header">All Coupon List</header>
                 <div class="card-body">

                <div class="adv-table">

                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                    <tr>
                        <th class="hidden-phone">Action</th>
                        <th>Name</th>
                        <th>Offer</th>
                        <th>Offer Details</th>
                        <th>Store</th>
                        <th>Type</th>
                        <th>Expiry</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $item)
                        <tr class="gradeA">
                            <td class="center hidden-phone">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                        <a class="dropdown-item" href="{{URL::to('admin/coupons/edit/'.Crypt::encryptString($item->id))}}">Edit</a>
                                        <a class="dropdown-item" href="{{URL::to('admin/coupons/delete/'.Crypt::encryptString($item->id))}}">Delete</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->offer_name}}</td>
                            <td>{{$item->offer_box}}</td>
                            <td>{{$item->offer_details}}</td>
                            <td>{{$item->store_title}}</td>
                            <td>@if($item->type == 'code') Coupon @else Deal @endif </td>
                            <td>@if($item->expiry)
                                {{ date('m-d-Y',strtotime($item->expiry)) }}@endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
           </div>
          </section>
         </div>
       </div>
@endsection
 @section('js')
    <script type="text/javascript" language="javascript" src="{{asset('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('/admin/js/dynamic_table_init.js')}}"></script>
@endsection