@extends('layouts.backend') @section('title','Brand') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Brand Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Brand</li>
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
            <h3 class="card-title">List Brand</h3>

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

                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Rank</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Action</th>



                    </tr>

                </thead>
                <tbody>
                    <?php $n=1 ?> @foreach($data as $d)

                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->slug}}</td>
                        <td>{{$d->rank}}</td>
                        <td>{{$d->status}}</td>
                        <td>{{DB::table('users')->where('id', $d->created_by)->value('name')}}</td>
                        <td>{{DB::table('users')->where('id', $d->updated_by)->value('name')}}</td>
                        <td>{{$d->created_at}}</td>
                        <th><a href="{{route('brand.show',$d->id)}}">ViewDetails</a>
                            <a href="{{route('brand.edit',$d->id)}}">Edit</a>
                            <form action="{{route('brand.destroy',$d->id)}}" method="post">
                                <input type="hidden" name="_method" value="DELETE"> @csrf
                                <input type="submit" value="Delete">
                            </form>

                        </th>

                    </tr>
                    @endforeach

                </tbody>
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
