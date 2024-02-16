@extends('admin.layout')
@section('css')

    <!--dynamic table-->
    <link href="{{asset('admin/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin/assets/data-tables/DT_bootstrap.css')}}" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

@endsection

@section('content')

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-headers">
                    VIEW YOUR BLOGS DETAILS
                    </header>
                
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-body">
                        <form action="{{URL::to('/admin/blogs/index')}}"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Search Your Blog Name</label>
                                        <select name="category" class="form-control form-control-lg mb-2">
                                            <option value="">All</option>
                                            @foreach ($blogCategory as $category)
                                            
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
                            <button type="submit" class="btn btn-primary">Search Your Blog</button>
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
                <header class="card-header">All Blogs List</header>
                 <div class="card-body">

                <div class="adv-table">

                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                    <tr>
                        <th class="hidden-phone">Action</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Featured 1</th>
                        <th>Featured 2</th>
                        <th>Featured 3</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $item)
                        <tr class="gradeA">
                            <td class="center hidden-phone">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                       
                                        <a class="dropdown-item" href="{{URL::to('admin/blogs/edit/'.Crypt::encryptString($item->id))}}">Edit</a>
                                        <a class="dropdown-item" href="{{URL::to('admin/blogs/delete/'.Crypt::encryptString($item->id))}}">Delete</a>
                                    </div>
                                </div>
                            </td>
                            <td><img style="width:50px;height:50px" src="{{asset('/admin/uploads/'.$item->image)}}" /> </td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->category_title}}</td>
                            <td>
                                <input
                                    @if($item->featured1 == 1)checked @endif 
                                    data-url="{{URL::to('admin/status')}}"
                                    data-id="{{Crypt::encryptString($item->id)}}"
                                    data-table="blogs" 
                                    data-column="featured1" 
                                    type="checkbox" 
                                    class="status_change" 
                                    data-toggle="toggle" 
                                    data-size="sm">
                            </td>
                            <td>
                                <input 
                                     @if($item->featured2)checked @endif 
                                    data-url="{{URL::to('admin/status')}}"
                                    data-id="{{Crypt::encryptString($item->id)}}"
                                    data-table="blogs" 
                                    data-column="featured2" 
                                    type="checkbox" 
                                    class="status_change" 
                                    data-toggle="toggle" 
                                    data-size="sm">
                            </td>
                            <td>
                                <input @if($item->featured3)checked @endif 
                                    data-url="{{URL::to('admin/status')}}"
                                    data-id="{{Crypt::encryptString($item->id)}}"
                                    data-table="blogs" 
                                    data-column="featured3" 
                                    type="checkbox" 
                                    class="status_change" 
                                    data-toggle="toggle" 
                                    data-size="sm">
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

    <script src="{{asset('admin/assets/switchery/switchery.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{asset('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('/admin/js/dynamic_table_init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.status_change').change(function (e) { 
                
                var url = $(this).attr('data-url');
                var id = $(this).attr('data-id');
                var table = $(this).attr('data-table');
                var column = $(this).attr('data-column');

                let checkbox = false
                if($(this).is(':checked')) {
                    checkbox = 1;
                } else {
                    checkbox = 0;
                }

                $.ajax({
                    url: url, 
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        url:url,
                        id:id,
                        table:table,
                        value:checkbox,
                        column:column,
                    }, 
                    success: function(data) {
                    
                    },
                    error: function(xhr, status, error) {
                    }
                });


                
            });
            

        });

    </script>
@endsection