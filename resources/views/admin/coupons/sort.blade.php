@extends('admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/assets/data-tables/DT_bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/nestable/jquery.nestable.css')}}" />

@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-headers">SORT YOUR COUPONS & SEE RESULT ON WEBSITE</header>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-body">
                        <form action="{{URL::to('/admin/coupons/sort')}}"  >
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
     </div>

    <!-- page start-->
       <section class="card">
        <header class="card-header">Sort Your Coupons</header>
        <div class="card-body">
            <div class="dd" id="nestable_list_1">
                <ol class="dd-list">
                    @foreach ($data as $item)
                    <li class="dd-item" data-id="{{$item->id}}">
                        <div class="dd-handle">{{$item->offer_box}}</div>
                    </li>
                    @endforeach
                </ol>
            </div>

            <form action="{{URL::to('/admin/coupons/sort_update')}}" method="post">
                 @csrf
                 <div class="d-none fields">
                  
                 </div>
                 <div class="container-fluid text-center pt-3">
                    <button class="btn btn-primary" type="submit" >Update</button>
                 </div>
            </form>
        </div>
    </section>

@endsection
 @section('js')

    <script type="text/javascript" language="javascript" src="{{asset('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('/admin/js/dynamic_table_init.js')}}"></script>
    <script src="{{asset('/admin/assets/nestable/jquery.nestable.js')}}"></script>
    <script>
            let sorting_list = [];
            $('#nestable_list_1').nestable({
                group: 1,
                maxDepth: 1
            }).on('change',function(){
                $('.fields').html('');
                    sorting_list = [];
                    $.each($('.dd-list').children(), function(index, value) {
                    let id = $(this).data('id');
                    let key = index;
                    $('.fields').append(`
                    <div class="field">
                    <input name="field[${key}][id]" value="${id}" />
                    <input name="field[${key}][key]" value="${key}" />
                    </div>`);
                });
            });
      </script>
@endsection