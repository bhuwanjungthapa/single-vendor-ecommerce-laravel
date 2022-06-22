@extends('layouts.backend') @section('title',$module) @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$module}} Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{$module}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$module}}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <form action="{{route($base_route.'update',$data['records']->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$data['records']->title}}" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="rank">Rank</label>
                    <input type="number" name="rank" class="form-control" id="rank" value="{{$data['records']->rank}}" placeholder="Rank">
                </div>
                <div class="form-group">
                    <label for="active">Status</label><br>
                    @if($data['records']->status==1)
                        <input type="radio" name="status" id="active" value="1" checked> Enable<br>
                        <input type="radio" name="status" d="active" value="0"> Disable<br>
                    @else
                        <input type="radio" name="status" id="active" value="1"> Enable<br>
                        <input type="radio" name="status" d="active" value="0" checked> Disable<br>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{$data['records']->slug}}" placeholder="Status">
                </div>
                <div class="form-group">
                    <label for="Image">Image</label><br>
                    <input type="file" name="image" class="" value="{{$data['records']->image}}" id="image">
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{$data['records']->meta_title}}" placeholder="Enter meta_title">
                </div>
                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword</label>
                    <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" value="{{$data['records']->meta_keyword}}" placeholder="Enter meta_keyword">
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{$data['records']->meta_description}}" placeholder="Enter meta_description">
                </div>
        </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
