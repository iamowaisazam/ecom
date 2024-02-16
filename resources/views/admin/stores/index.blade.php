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
                    VIEW YOUR STORES DETAILS
                    </header>
                
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-body">
                        <form action="{{URL::to('/admin/stores/index')}}"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Search Your Store Name</label>
                                        <select name="category" class="form-control form-control-lg mb-2">
                                            <option value="">All</option>
                                            @foreach ($storeCategory as $category)
                                            
                                            <option
                                            @if(request()->category == $category->id)
                                            {{'selected'}}
                                            @endif 
                                            value="{{$category->id}}" >{{$category->title}}</option>
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
                <header class="card-header">All Store List</header>
                 <div class="card-body">

                <div class="adv-table">

                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                    <tr>
                        <th class="hidden-phone">Action</th>
                        <th>Logo</th>
                        <th>Store Name</th>
                        <th>Total Number Of Coupons</th>
                        <th>Store Category</th>
                        <th>Heading</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $item)
                        <tr class="gradeA">
                            <td class="center hidden-phone">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                        <a class="dropdown-item" href="{{URL::to('admin/stores/view/'.Crypt::encryptString($item->id))}}">View</a>
                                        <a class="dropdown-item" href="{{URL::to('admin/stores/edit/'.Crypt::encryptString($item->id))}}">Edit</a>
                                        <a class="dropdown-item" href="{{URL::to('admin/stores/delete/'.Crypt::encryptString($item->id))}}">Delete</a>
                                        @if($item->is_enable)
                                          <a class="dropdown-item" href="{{URL::to('admin/stores/status/'.Crypt::encryptString($item->id))}}">Disable</a>
                                        @else
                                           <a class="dropdown-item" href="{{URL::to('admin/stores/status/'.Crypt::encryptString($item->id))}}">Enable</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td><img style="width:50px;height:50px" src="{{asset('/admin/uploads/'.$item->image)}}" /> </td>
                            <td>{{$item->title}}</td>
                            <td>{{$coupons->where('store_id',$item->id)->count()}}</td>
                            <td>{{$item->category_title}}</td>
                            <td>{{ ucwords(str_ireplace("_", " ",$item->heading))}}</td>
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