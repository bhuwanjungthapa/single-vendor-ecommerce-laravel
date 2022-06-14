@extends('layouts.backend') @section('title','Category') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
            <h3 class="card-title">Category Details</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    

                    <tr>
                        <th>Title</th>
                        <td>{{$category->title}}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{$category->slug}}</td>
                    </tr>

                    <tr>
                        <th>Rank</th>
                        <td>{{$category->rank}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>{{$category->image}}</td>
                    </tr>
                    <tr>
                        <th>Meta Tile</th>
                        <td>{{$category->meta_title}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$category->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$category->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$category->status}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{DB::table('users')->where('id', $category->created_by)->value('name')}}</td>
                    </tr>

                    <tr>
                        <th>Updated By</th>
                        <td>{{DB::table('users')->where('id', $category->updated_by)->value('name')}}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$category->created_at}}</td>
                    </tr>

                </thead>
               
            </table>
        </div>
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