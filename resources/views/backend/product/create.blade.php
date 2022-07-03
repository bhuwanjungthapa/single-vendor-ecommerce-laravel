@extends('layouts.backend')
@section('title',$module) @section('content')
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

        <div class="card">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Add new {{$module}}</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#basic" data-toggle="tab">Basic Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="#meta" data-toggle="tab">Meta Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">Image</a></li>
                    <li class="nav-item"><a class="nav-link" href="#attribute" data-toggle="tab">Attribute</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        @include('backend.product.includes.basic')
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="meta">
                        @include('backend.product.includes.meta')
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="image">
                        @include('backend.product.includes.image')
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="attribute">
                        @include('backend.product.includes.attribute')
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
            <div class="card-footer">
                <div class="form-group">
                    {!! Form::submit('Save ' . $module, ['class' => 'btn btn-info']); !!}
                    {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
                </div>
            </div><!-- /.card-footer -->
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
    </script>

    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        var attribute_wrapper = $("#attribute_wrapper"); //Fields wrapper
        var add_button_attribute = $("#addMoreAttribute"); //Add button ID
        var y = 1;
        $(add_button_attribute).click(function (e) { //on add input button click
            e.preventDefault();
            var max_fields = 5; //maximum input boxes allowed
            if (y < max_fields) { //max input box allowed
                y++; //text box increment
                //add new row
                $("#attribute_wrapper tr:last").after(
                    '<tr>'+
                    '   <td>{!! Form::select('attribute_id[]',[],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
                    '   </td>'+
                    '   <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
                    '   <td>'+
                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
                    '   </td>'+
                    '</tr>'
                );
            }else{
                alert('Maximum Attribute Limit is 5');
            }
        });
        //remove row
        $(attribute_wrapper).on("click", ".remove_row", function (e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            y--;
        });
    </script>
    <script>
        var image_wrapper = $("#image_wrapper"); //Fields wrapper
        var add_button_image = $("#addMoreImage"); //Add button ID
        var x = 1;
        $(add_button_image).click(function (e) { //on add input button click
            e.preventDefault();
            var max_fields = 5; //maximum input boxes allowed
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                //add new row
                $("#image_wrapper tr:last").after(
                    '<tr>'+
                    '   <td> {!!  Form::file('image_file[]', null,['class' => 'form-control'])!!}'+
                    '   </td>'+
                    '   <td><input type="text" name="image_title[]" class="form-control" placeholder="Enter image_title Value"/></td>'+
                    '   <td>'+
                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
                    '   </td>'+
                    '</tr>'
                );
            }else{
                alert('Maximum Image Limit is 5');
            }
        });
        $(image_wrapper).on("click", ".remove_row", function (e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            x--;
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        {{--$('#category_id').change(function(){--}}
        {{--    var catid = $(this).val();--}}
        {{--    $.ajax({--}}
        {{--        method: "POST",--}}
        {{--        url: "{{route('category.getsubcategory')}}",--}}
        {{--        data:{'id':catid},--}}
        {{--        success:function (resp){--}}
        {{--            $('#subcategory_id').html(resp);--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection
