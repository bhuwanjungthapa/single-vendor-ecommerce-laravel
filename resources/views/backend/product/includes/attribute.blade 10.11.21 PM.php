<table class="table table-striped table-bordered" id="attribute_wrapper">
    <tr>
        <th>Attribute</th>
        <th>Value</th>
        <th>Action</th>
    </tr>
        <tr>
            <td>
                {!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}
            </td>
            <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>
            <td>
                <a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>
            </td>
        </tr>

</table>
<button class="btn btn-info" type="button" id="addMoreAttribute" style="margin-bottom: 20px">
    <i class="fa fa-plus"></i>
    Add
</button>
