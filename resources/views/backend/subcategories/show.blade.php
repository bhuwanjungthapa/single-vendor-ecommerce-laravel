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
            <h3 class="card-title">{{$module}} Details</h3>

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
                        <td>{{$data->title}}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{$data->slug}}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{$data->category->title}}</td>
                    </tr>
                    <tr>
                        <th>Rank</th>
                        <td>{{$data->rank}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>{{$data->image}}</td>
                    </tr>
                    <tr>
                        <th>Meta Title</th>
                        <td>{{$data->meta_title}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$data->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$data->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @include('backend.include.status',['status'=>$data->status])
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{$data->createdBy->name}}</td>
                    </tr>
                    <tr>
                        <th>Updated By</th>
                        <td>
                            @if(!empty($data->updated_by))
                                {{$data->updatedBy->name}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data->created_at}}</td>

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
