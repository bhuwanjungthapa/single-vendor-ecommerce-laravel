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
                <h3 class="card-title">{{$module}}Details
                    <a href="{{route($base_route.'index')}}" class="btn btn-info">List</a>
                </h3>

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
                        <th>Id</th>
                        <td>{{$data->id}}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{$data->name}}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @include('backend.include.status',['status'=>$data->status])
                        </td>
                    </tr>

                    <tr>
                        <th>Password</th>
                        <td>{{$data->password}}</td>
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
