@extends('layouts.backend')
@section('title','Update Tags')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Old Tag</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="form-group">
            <form action="{{route('tag.update',$data->tags_id)}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="{{$data->title}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" value="{{$data->slug}}">
                    </div>
                </div>
                <div class="form-group row">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="slug" value="{{$data->slug}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Created By</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" value="{{$data->created_by}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Updated_by</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" value="{{$data->updated_by}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
