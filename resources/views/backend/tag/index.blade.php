@extends('layouts.backend')
@section('title','Category list')

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

      <div>
          @if(session('success'))
              <p style="background: green; padding:10px">{{session('success')}}</p>

          @endif
          @if(session('error'))
              <p style="background: red">{{session('error')}}</p>
          @endif
          <table>

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
                  <th>Deleted Date</th>
                  <th>Action</th>

              </tr>
              @foreach ( $data as $d)
                  <tr>


                      <th>{{$d->i+1}}</th>
                      <th>{{$d->tags_id}}</th>
                      <th>{{$d->title}}</th>
                      <th>{{$d->status}}</th>
                      <th>{{$d->slug}}</th>
                      <th>{{auth()->user()->name}}</th>
                      <th>{{auth()->user()->name}}</th>
                      <th>{{$d->created_at}}</th>
                      <th>{{$d->updated_at}}</th>
                      <th>{{$d->deleted_at}}</th>
                      <td><a href="{{}}">View  details</a></td>

                  </tr>
              @endforeach
          </table>

      </div>

    </section>
    <!-- /.content -->
@endsection
