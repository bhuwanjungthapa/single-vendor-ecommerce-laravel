@extends('layouts.backend') @section('title',$module) @section('content')
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
                <h3 class="card-title">{{$module}}
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
            <form action="{{route($base_route.'update',$data['records']->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="card-body">
                    {!!Form::model($data['records'],['route' => [$base_route.'store'],'method'=>'post'])!!}
                    <div class="form-group">
                        {!!Form::label('site_name','Site Name')!!}
                        {!!Form::text ('site_name',null,['class'=> 'form-control','placeholder'=>'Site Name'])!!}
                        @error('site_name')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('site_slogan','Site Slogan')!!}
                        {!!Form::text ('site_slogan',null,['class'=> 'form-control','placeholder'=>'Site Slogan'])!!}
                        @error('site_slogan')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('site_logo','Site Logo')!!}
                        {!!Form::text ('site_logo',null,['class'=> 'form-control','placeholder'=>'Site Log'])!!}
                        @error('site_logo')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('site_favicon','Site Favicon')!!}
                        {!!Form::file('site_favicon',null,['class'=> 'form-control','placeholder'=>'Site Favicon'])!!}
                        @error('site_favicon')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('address','Address')!!}
                        {!!Form::text('address',null,['class'=> 'form-control','placeholder'=>'Address'])!!}
                        @error('address')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('email','Email')!!}
                        {!!Form::text('email',null,['class'=> 'form-control','placeholder'=>'Email'])!!}
                        @error('email')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('phone','Phone')!!}
                        {!!Form::number('phone',null,['class'=> 'form-control','placeholder'=>'Phone'])!!}
                        @error('phone')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('google_map_link','Google Map Link')!!}
                        {!!Form::text('google_map_link',null,['class'=> 'form-control','placeholder'=>'Google Map Link'])!!}
                        @error('google_map_link')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('twitter_link','Twitter Map Link')!!}
                        {!!Form::text('twitter_link',null,['class'=> 'form-control','placeholder'=>'Twitter Map Link'])!!}
                        @error('twitter_link')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('instagram_link','Instagram Map Link')!!}
                        {!!Form::text('instagram_link',null,['class'=> 'form-control','placeholder'=>'Instagram Map Link'])!!}
                        @error('instagram_link')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div>
                        {!!Form::submit('Save' .''.$module,['class'=>'btn btn-success'])!!}
                        {!!Form::reset('Reset'.''.$module,['class'=>'btn btn-danger'])!!}
                    </div>
                    {{Form::close()}}
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
