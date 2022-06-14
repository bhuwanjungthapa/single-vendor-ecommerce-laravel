@extends('layouts.backend') @section('title','Product') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
            <h3 class="card-title">Product Details</h3>

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
                        <td>{{$product->title}}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{$product->slug}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$product->status}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$product->status}}</td>
                    </tr>
                    {{-- <tr>
                        <th>Specification</th>
                        <td>{{$product->specification}}</td>
                    </tr> --}}
                    <tr>
                        <th>Description</th>
                        <td>{{$product->description}}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{$product->price}}</td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>{{$product->discount}}</td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td>{{$product->stock}}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{$product->quantity}}</td>
                    </tr>
                    <tr>
                        <th>Meta Tile</th>
                        <td>{{$product->meta_title}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$product->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$product->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{DB::table('users')->where('id', $product->created_by)->value('name')}}</td>
                    </tr>

                    <tr>
                        <th>Updated By</th>
                        <td>{{DB::table('users')->where('id', $product->updated_by)->value('name')}}</td>
                    </tr>



                    <tr>
                        <th>Created At</th>
                        <td>{{$product->created_at}}</td>

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
