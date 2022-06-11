@extends('layouts.backend')
@section('title','Tags')

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
                  <th>Deleted Date</th>
                  <th>Action</th>

              </tr>
              <?php $n++; ?>
              @foreach ( $data as $d)
                  <tr>
                      <th>{{ $n++ }}</th>
                      <th>{{$d->tags_id}}</th>
                      <th>{{$d->title}}</th>
                      <th>{{$d->status}}</th>
                      <th>{{$d->slug}}</th>
                      <th>{{DB::table('users')->where('id', $d->created_by)->value('name')}}</th>
                      <th>{{DB::table('users')->where('id', $d->updated_by)->value('name')}}</th>
                      <th>{{$d->created_at}}</th>
                      <th>{{$d->updated_at}}</th>
                      <th>{{$d->deleted_at}}</th>
                      <td>
                          <a href="{{route('tag.edit',$d->tags_id)}}">Edit</a>
                          {{--<a href="{{route('tag.index',$d->id)}}">Delete</a>--}}
                         {{-- <form action="{{route('tag.index',$d->id)}}" method="post">
                              <input type="hidden" name="_method" value="DELETE">
                              @csrf
                              <input type="submit" value="Delete">
                          </form>--}}
                      </td>
                      </td>

                  </tr>
              @endforeach
          </table>

      </div>

    </section>
    <!-- /.content -->
@endsection
