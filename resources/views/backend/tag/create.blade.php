@extends('layouts.backend')
@section('title','Tag') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Tag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tag</li>
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
                <h3 class="card-title"> Tag</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <form action="{{route('tag.store')}}" method="post">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title"  value="{{old('title')}}" placeholder="Enter Title">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{old('slug')}}" placeholder="Status">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <input type="radio" name="status" value="1"> Enable<br>
                        <input type="radio" name="status" value="2" > Disable<br>
                    </div>

                    {{--<input type="hidden" value="{{auth()->user()->id}}" name="created_by">--}}


                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary">
                        <input type="reset" class="btn btn-primary">
                </div>
            </form>

            <!-- /.card-body -->

        </div>
        <!-- /.card -->

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
