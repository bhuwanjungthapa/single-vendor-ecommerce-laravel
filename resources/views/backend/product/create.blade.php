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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$module}}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <form action="{{route($base_route.'store')}}" method="post">
                @csrf
                <div class="card-body">


                    {{--<div class="form-group">
                        <label for="title">Category</label>
                        <select class="form-control" id="category_id" name="category_id" >
                            @foreach($data['categories'] as $record)
                                <option value="{{$record->id}}">{{$record->title}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group">
                        {!!Form::label('category_id','Category')!!}
                        {!!Form::select ('category_id',$data['categories'],null,['class'=> 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('subcategory_id','subcategory')!!}
                        {!!Form::select ('subcategory_id',$data['subcategories'],null,['class'=> 'form-control'])!!}
                    </div>

                    {{--<div class="form-group">
                        <label for="title">Sub Category</label>
                        <select class="form-control" id="subcategory_id " name="subcategory_id" >
                            @foreach($data['subcategories'] as $record)
                                <option value="{{$record->id}}">{{$record->title}}</option>
                            @endforeach

                        </select>
                    </div>--}}

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <input type="radio" name="status" value="1" checked> Enable<br>
                        <input type="radio" name="status" value="2"> Disable<br>
                    </div>
                    <div class="form-group">
                        <label for="specification">Specification</label>
                        <input type="text" name="specification" class="form-control" id="specification" placeholder="Enter specification">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter discount">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter stock amount">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity amount">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Flash Key</label>
                        <input type="number" name="flash_key" class="form-control" id="flash_key" placeholder="Enter flash_key">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Hot Key</label>
                        <input type="text" name="hot_key" class="form-control" id="hot_key" placeholder="Enter hot_key">
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta_title">
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter meta_keyword">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Enter meta_description">
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

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

