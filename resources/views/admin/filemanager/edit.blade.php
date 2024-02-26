@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">{{__('add_department')}}</h4>
                </div>
                <div class="col-md-7 align-self-center text-end">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('home'); }}">{{__('dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('department')}}</li>
                        </ol>
                        <a href="{{ url('department-list') }}" class="btn btn-sm btn-primary d-none d-lg-block m-l-15 text-white"><i
                                class="fa fa-eye"></i>{{__('view_list')}}</a>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Edit File</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('filemanager.update',$filemanager->id)}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="container">

                                    <div class="my-2 row">
                                        <div class="col-md-12">
                                              <label class="form-label">Title</label>
                                              <input type="text" name="title" class="form-control" value="{{$filemanager->title}}" placeholder="{{__('title')}}">
                                              @if ($errors->has('title'))
                                                <small class="text-danger">{{ $errors->first('title')}}</small>
                                              @endif
                                        </div>
                                    </div>

                                    <div class="my-2 row">
                                        <div class="col-md-12">
                                              <label class="form-label">Description</label>
                                              <input type="text" name="description" class="form-control" 
                                              value="{{$filemanager->description}}" placeholder="Description" />
                                              @if ($errors->has('description'))
                                                <small class="text-danger">{{ $errors->first('description')}}</small>
                                              @endif
                                        </div>
                                    </div>

                                    <div class="my-2 row">
                                        <div class="col-md-12">
                                              <label class="form-label">Filename</label>
                                              <input disabled class="form-control" value="{{$filemanager->filename}}" placeholder="Filename">
                                        </div>
                                    </div>

                                    <div class="my-2 row">
                                        <div class="col-md-12">
                                              <label class="form-label">File Size</label>
                                              <input disabled class="form-control" value="{{$filemanager->size}}" placeholder="File Size">
                                        </div>
                                    </div>

                                    <div class="my-2 row">
                                        <div class="col-md-12">
                                              <label class="form-label">Extension</label>
                                              <input disabled class="form-control" value="{{$filemanager->extension}}" placeholder="Extension">
                                        </div>
                                    </div>

                                    <div class="my-2 row">
                                        <div class="col-md-12">
                                              <label class="form-label">FileType</label>
                                              <input disabled class="form-control" value="{{$filemanager->type}}" placeholder="File Type">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary text-white">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
