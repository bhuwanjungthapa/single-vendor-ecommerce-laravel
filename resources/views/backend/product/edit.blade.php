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
        <div class="card-body">
            {!!Form::model($data['records'],['route' => [$base_route.'update',$data['records']->id],'method'=>'post'])!!}
            {!!Form::hidden('_method','PUT')!!}
            @csrf
            <div class="form-group">
                    {!!Form::label('category_id','Category')!!}
                    {!!Form::select ('category_id',$data['categories'],null,['class'=> 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('subcategory_id','Subcategory')!!}
                    {!!Form::select ('subcategory_id',$data['subcategories'],null,['class'=> 'form-control'])!!}
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
                {!!Form::label('status','Status')!!}<br>
                @if($data['records']->status==1)
                    {{Form::radio('status',1,true,['class'=>'field'])}}Enable<br>
                    {{Form::radio('status',0,false,['class'=>'field'])}}Disable<br>
                @else
                    {{Form::radio('status',1,true,['class'=>'field'])}}Enable<br>
                    {{Form::radio('status',0,false,['class'=>'field'])}}Disable<br>
                @endif
            </div>
                <div class="form-group">
                    {!!Form::label('specification','Specification')!!}
                    {!!Form::textarea('specification',null,['class'=> 'form-control','placeholder'=>'Specification'])!!}
                    <br>
                </div>
                <div class="form-group">
                    {!!Form::label('description','Description')!!}
                    {!!Form::textarea('description',null,['class'=> 'form-control','placeholder'=>'Description'])!!}
                    <br>
                </div>
                <div class="form-group">
                    {!!Form::label('price','Price')!!}
                    {!!Form::number('price',null,['class'=> 'form-control','placeholder'=>'Price'])!!}
                    @error('price')
                    <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    {!!Form::label('discount','Discount')!!}
                    {!!Form::number('discount',null,['class'=> 'form-control','placeholder'=>'Discount'])!!}
                    @error('discount')
                    <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    {!!Form::label('stock','Stock')!!}
                    {!!Form::number('stock',null,['class'=> 'form-control','placeholder'=>'Stock'])!!}
                    @error('stock')
                    <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    {!!Form::label('quantity','Quantity')!!}
                    {!!Form::number('quantity',null,['class'=> 'form-control','placeholder'=>'Quantity'])!!}
                    @error('quantity')
                    <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    {!!Form::label('flash_key','Flash Key')!!}<br>
                    @if($data['records']->status==1)
                        {{Form::radio('flash_key',1,true,['class'=>'field'])}}Enable<br>
                        {{Form::radio('flash_key',0,false,['class'=>'field'])}}Disable<br>
                    @else
                        {{Form::radio('flash_key',1,true,['class'=>'field'])}}Enable<br>
                        {{Form::radio('flash_key',0,false,['class'=>'field'])}}Disable<br>
                    @endif
                </div>
            <div class="form-group">
                {!!Form::label('hot_key','Hot Key')!!}<br>
                @if($data['records']->status==1)
                    {{Form::radio('hot_key',1,true,['class'=>'field'])}}Enable<br>
                    {{Form::radio('hot_key',0,false,['class'=>'field'])}}Disable<br>
                @else
                    {{Form::radio('hot_key',1,true,['class'=>'field'])}}Enable<br>
                    {{Form::radio('hot_key',0,false,['class'=>'field'])}}Disable<br>
                @endif
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
                <div>
                    {!!Form::submit('Save' .''.$module,['class'=>'btn btn-success'])!!}
                    {!!Form::reset('Clear'.''.$module,['class'=>'btn btn-danger'])!!}
                </div>
                {{Form::close()}}

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
