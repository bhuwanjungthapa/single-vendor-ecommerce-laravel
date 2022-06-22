@extends('layouts.backend')
@section('title',$module)

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tag Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tag</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trash
                    <a href="{{route($base_route.'create')}}" class="btn btn-info">Create</a>
                    <a href="{{route($base_route.'index')}}" class="btn btn-info">List</a>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

        <?php $n = 0; ?>
        <div>
            @if(session('success'))
                <p style="background: green; padding:10px">{{session('success')}}</p>

            @endif
            @if(session('error'))
                <p style="background: red">{{session('error')}}</p>
            @endif

            <table class="table table-sm">

                <tr>
                    <th>S.No</th>
                    <th>Id</th>
                    <th>Tag Name</th>
                    <th>Status</th>
                    <th>Slug</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>

                </tr>
                <?php $n++; ?>
                @foreach($data['records'] as $record)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{$record->id}}</td>
                        <td>{{$record->title}}</td>
                        <td>
                            @include('backend.include.status',['status'=>$record->status])
                        </td>
                        <td>{{$record->slug}}</td>
                        <td>{{$record->createdBy->name}}</td>

                        <td>
                            @if(!empty($record->updated_by))
                                {{$record->updatedBy->name}}
                            @endif
                        </td>
                        <td>{{$record->created_at}}</td>
                        <td>{{$record->updated_at}}</td>

                        <th>
                            <form action="{{route($base_route.'restore',$record->id)}}" method="post" style="display:inline-block">
                                @csrf
                                <input type="submit" class="btn btn-primary" value="Restore">
                            </form>
                            <form action="{{route($base_route.'force_delete',$record->id)}}" method="post" style="display:inline-block">
                                @method("delete")
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </th>

                    </tr>
                @endforeach
            </table>

        </div>

    </section>
    <!-- /.content -->
@endsection
