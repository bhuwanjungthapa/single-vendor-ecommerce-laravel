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
                        <li class="breadcrumb-item active">{{$module}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Add new {{$module}}</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#basic" data-toggle="tab">Basic Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="#meta" data-toggle="tab">Meta Data</a></li>
                            <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">Image</a></li>
                            <li class="nav-item"><a class="nav-link" href="#attribute" data-toggle="tab">Attribute</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="basic">
                                @include('backend.product.includes.basic')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="meta">
                                @include('backend.product.includes.meta')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="image">
                                @include('backend.product.includes.image')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="attribute">
                                @include('backend.product.includes.attribute')
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    <div class="card-footer">
                        <div class="form-group">
                            {!! Form::submit('Save ' . $module, ['class' => 'btn btn-info']); !!}
                            {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
                        </div>
                    </div><!-- /.card-footer -->
                </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script>
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
    </script>
@endsection

