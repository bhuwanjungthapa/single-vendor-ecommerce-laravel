<table class="table table-striped table-bordered" id="image_wrapper">
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>
            {!!  Form::file('image_file[]', null,['class' => 'form-control'])!!}
        </td>
        <td><input type="text" name="image_title[]" class="form-control" placeholder="Enter Image Title"/></td>
        <td>
            <a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>
        </td>
    </tr>
</table>
<button class="btn btn-info" type="button" id="addMoreImage" style="margin-bottom: 20px">
    <i class="fa fa-plus"></i>
    Add
</button>
