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
                        <li class="breadcrumb-item active">Tag</li>
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
            <form action="{{route($base_route.'update',$data['records']->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="card-body">
                    {!!Form::model($data['records'],['route' => [$base_route.'store'],'method'=>'post'])!!}


                    <div class="form-group">
                        {!!Form::label('name','Name')!!}
                        {!!Form::text ('name',null,['class'=> 'form-control'])!!}
                        @error('name')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('email','Email')!!}
                        {!!Form::text ('email',null,['class'=> 'form-control'])!!}
                        @error('email')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="active">Status</label><br>
                        @if($data['records']->status==1)
                            {!!Form::label('status','Status')!!} <br>
                            <input type="radio" name="status" value="1" checked> Enable<br>
                            <input type="radio" name="status" value="2"> Disable<br>
                        @else
                            {!!Form::label('status','Status')!!} <br>
                            <input type="radio" name="status" value="1"> Enable<br>
                            <input type="radio" name="status" value="2" checked> Disable<br>
                        @endif
                    </div>

                    <div class="form-group">
                        {!!Form::label('password','Password')!!}
                        {!!Form::password('password',null,['class'=> 'form-control'])!!}
                        <br>
                    </div>

                    <div>
                        {!!Form::submit('Save' .''.$module,['class'=>'btn btn-success'])!!}
                        {!!Form::reset('Clear'.''.$module,['class'=>'btn btn-danger'])!!}
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
