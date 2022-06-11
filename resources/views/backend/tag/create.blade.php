@extends('layouts.backend')
@section('title','Category list')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Tag</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div>
            <form action="{{route('tag.store')}}" method="post">
                @csrf
                <label for="name">Tag Title:</label>
                <input type="text" id="tag" name="title"><br><br>
                <label for="price">Slug</label>
                <input type="text" id="slug" name="slug" placeholder="same as title"><br><br>
                <label for="price">Status</label>
                <input type="number" id="status" name="status"><br><br>
                <input type="hidden" value="{{auth()->user()->id}}" name="created_by">
                <input type="submit">
            </form>
        </div>
    </section>




@endsection
