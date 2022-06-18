@extends('layouts.backend') @section('title','Tag') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attribute Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attribute</li>
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
                <h3 class="card-title">Attribute List</h3>

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
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        {{-- <th>Slug</th> --}}
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
                            {{-- <td>{{$d->slug}}</td> --}}
                            <td>{{$d->status}}</td>
                            <td>{{DB::table('users')->where('id', $d->created_by)->value('name')}}</td>
                            <td>
                                @if(!empty($d->updated_by))
                                    {{DB::table('users')->where('id', $d->updated_by)->value('name')}}
                                @endif
                            </td>
                            <td>{{$d->created_at}}</td>
                            <td>
                                <a href="{{route('attribute.edit',$d->id)}}">Edit</a>
                            </td>
                            <td><form action="{{route('attribute.destroy',$d->id)}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                            </td>

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
