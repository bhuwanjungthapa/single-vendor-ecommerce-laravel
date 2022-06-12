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
            <form action="{{route('tag.update',$data->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
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
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="status" value="{{$data->status}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="created_by" class="col-sm-2 col-form-label">Created By</label>
                    <select id="cars" name="cars">
                        <option value="{{DB::table('users')->where('id', $data->created_by)->value('id')}}">{{DB::table('users')->where('id', $data->created_by)->value('name')}}</option>
                        @foreach($userid as $d)
                            <option value="{{DB::table('users')->where('id', $data->created_by)->value('id')}}">{{DB::table('users')->where('id', $data->created_by)->value('name')}}</option>
                        @endforeach

                    </select>
                    <div class="col-sm-10">

                    </div>
                </div>
                <input type="hidden" value="{{auth()->user()->id}}" name="updated_by">

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
