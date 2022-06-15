@extends('layouts.backend') @section('title','Subcategory') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Subcategory Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
            <h3 class="card-title">Subcategory</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <form action="{{route('subcategories.update',$product->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$product->title}}" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label for="status">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{$product->slug}}" placeholder="Status">
                </div>
                <div class="form-group">
                    <label for="rank">Rank</label>
                    <input type="number" name="rank" class="form-control" id="rank" value="{{$product->rank}}" placeholder="Rank">
                </div>
                <div class="form-group">
                    <label for="Image">Image</label></br>
                    <input type="file" name="image" class="" value="{{$product->image}}" id="image">
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{$product->meta_title}}" placeholder="Meta Title">
                </div>
                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword</label>
                    <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" value="{{$product->meta_keyword}}" placeholder="Meta Keyword">
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label><br>
                    <textarea name="meta_description" cols="40" rows="5"  value="{{$product->meta_description}}" placeholder="Meta Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label><br>
                    <input type="radio" name="status" value="1"> Enable<br>
                    <input type="radio" name="status" value="2"> Disable<br>
                </div>

                <input type="hidden" value="{{auth()->user()->id}}" name="updated_by">


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
