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
            <form action="{{route($base_route.'update',$data['records']->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="{{$data['records']->title}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" value="{{$data['records']->slug}}">
                    </div>
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


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
