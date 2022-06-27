@extends('layouts.backend')
@section('title',$module . ' Create')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('main-content')
    <!-- Main content -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route($base_route.'index')}}" class="btn btn-info">List {{$module}}</a>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Create {{$module}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mt-4">
                                <nav class="w-100">
                                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="product-basic-tab" data-toggle="tab" href="#basic_tab" role="tab" aria-controls="product-desc" aria-selected="true">Basic Product Details</a>
                                        <a class="nav-item nav-link" id="product-meta-tab" data-toggle="tab" href="#meta_tab" role="tab" aria-controls="product-comments" aria-selected="false">Meta Information</a>
                                        <a class="nav-item nav-link" id="product-image-tab" data-toggle="tab" href="#image_tab" role="tab" aria-controls="product-rating" aria-selected="false">Images</a>
                                        <a class="nav-item nav-link" id="product-tag-tab" data-toggle="tab" href="#tag_tab" role="tab" aria-controls="product-rating" aria-selected="false">Tag</a>
                                        <a class="nav-item nav-link" id="product-attribute-tab" data-toggle="tab" href="#attribute_tab" role="tab" aria-controls="product-rating" aria-selected="false">Attribute</a>
                                    </div>
                                </nav>
                                {!! Form::open(['route' => $base_route . 'store', 'method' => 'post','files' => true]) !!}
                                <div class="tab-content p-3" id="nav-tabContent">
                                    <div class="tab-pane fade active show" id="basic_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                        @include('backend.product.includes.basic')
                                    </div>
                                    <div class="tab-pane fade" id="meta_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                        @include('backend.product.includes.meta')
                                    </div>
                                    <div class="tab-pane fade" id="image_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                        @include('backend.product.includes.image')
                                    </div>
                                    <div class="tab-pane fade" id="tag_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                        @include('backend.product.includes.tag')
                                    </div>
                                    <div class="tab-pane fade" id="attribute_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                        @include('backend.product.includes.attribute')
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Save ' . $module, ['class' => 'btn btn-info']); !!}
                                    {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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
                    '   <td>{!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
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
        $('#category_id').change(function(){
            var catid = $(this).val();
            $.ajax({
                method: "POST",
                url: "{{route('category.getsubcategory')}}",
                data:{'id':catid},
                success:function (resp){
                    $('#subcategory_id').html(resp);
                }
            });
        });
    </script>
@endsection
