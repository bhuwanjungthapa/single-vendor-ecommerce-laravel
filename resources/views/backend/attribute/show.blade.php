@extends('layouts.backend')
@section('title',$module) @section('content')
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
                        <li class="breadcrumb-item active">Option</li>
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
                        <td>{{$data['records']->title}}</td>
                    </tr>

                    {{-- <tr>
                        <th>Slug</th>
                        <td>{{$option->slug}}</td>
                    </tr> --}}
                    <tr>
                        <th>Status</th>
                        <td>
                            @include('backend.include.status',['status'=>$data['records']->status])
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{$data['records']->createdBy->name}}</td>
                    </tr>

                    <tr>
                        <th>Updated By</th>
                        <td>
                            @if(!empty($data['records']->updated_by))
                                {{$data['records']->updatedBy->name}}
                            @endif
                        </td>
                    </tr>



                    <tr>
                        <th>Created At</th>
                        <td>{{$data['records']->created_at}}</td>
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
