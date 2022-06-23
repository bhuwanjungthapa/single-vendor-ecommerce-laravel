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
               {{-- <div class="form-group">
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
                        {!!Form::label('title','Title')!!}
                        {!!Form::text ('title',null,['class'=> 'form-control','placeholder'=>'Title'])!!}
                        @error('title')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('slug','Slug')!!}
                        {!!Form::text ('slug',null,['class'=> 'form-control','placeholder'=>'Slug'])!!}
                        @error('slug')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('rank','Rank')!!}
                        {!!Form::number('rank',null,['class'=> 'form-control','placeholder'=>'Rank'])!!}
                        @error('rank')
                        <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        {!!Form::label('image','Image')!!}
                        {!!Form::file('image',null,['class'=> 'form-control','placeholder'=>'Image'])!!}

                    </div>
                    <div class="form-group">
                        {!!Form::label('meta_title','Meta Title')!!}
                        {!!Form::text('meta_title',null,['class'=> 'form-control','placeholder'=>'Meta Title'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('meta_keyword','Meta Keyword')!!}
                        {!!Form::text('meta_keyword',null,['class'=> 'form-control','placeholder'=>'Meta Keyword'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('meta_description','Meta Description')!!}
                        {!!Form::textarea('meta_description',null,['class'=> 'form-control','placeholder'=>'Meta Description'])!!}

                        <br>
                    </div>
                    <div class="form-group">
                        {!!Form::label('status','Status')!!} <br>
                        <input type="radio" name="status" value="1"> Enable<br>
                        <input type="radio" name="status" value="2" checked> Disable<br>
                    </div>
                <div>
                    {!!Form::submit('Save' .''.$module,['class'=>'btn btn-success'])!!}
                    {!!Form::reset('Clear'.''.$module,['class'=>'btn btn-danger'])!!}
                </div>
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
@endsection @section('js')
<script>
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });
</script>
@endsection
