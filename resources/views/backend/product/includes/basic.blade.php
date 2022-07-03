<div class="form-group">
    {!! Form::label('category_id', 'Category'); !!}
    {!! Form::select('category_id',$data['categories'], null,['class' => 'form-control','placeholder' => 'Select']); !!}
</div>
<div class="form-group">
    {!! Form::label('subcategory_id', 'SubCategory'); !!}
    {!! Form::select('subcategory_id',[], null,['class' => 'form-control','placeholder' => 'Select']); !!}
</div>
<div class="form-group">
    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title', null,['class' => 'form-control']); !!}
{{--    @include('backend.common.validation_field',['field' => 'title'])--}}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug'); !!}
    {!! Form::text('slug', null,['class' => 'form-control']); !!}
{{--    @include('backend.common.validation_field',['field' => 'slug'])--}}
</div>
<div class="form-group">
    {!! Form::label('price', 'Price'); !!}
    {!! Form::number('price', null,['class' => 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('discount', 'Discount'); !!}
    {!! Form::number('discount', null,['class' => 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('quantity', 'Quantity'); !!}
    {!! Form::number('quantity', null,['class' => 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('unit_id', 'Unit'); !!}
    {!! Form::select('unit_id',$data['units'], null,['class' => 'form-control','placeholder' => 'Select Unit']); !!}
</div>
<div class="form-group">
    {!! Form::label('feature_product', 'Feature Product'); !!}<br>
    {!!Form::radio('feature_product', 1, true); !!}YES
    {!!Form::radio('feature_product', 0, false);!!}NO
</div>
<div class="form-group">
    {!! Form::label('flash_product', 'Flash Product'); !!}<br>
    {!!Form::radio('flash_product',1, true); !!}YES
    {!!Form::radio('flash_product', 0, false);!!}NO
</div>
<div class="form-group">
    {!! Form::label('status', 'Status'); !!}
    {!! Form::radio('status', 1); !!} Active
    {!! Form::radio('status', 0,true); !!} Deactive
</div>
<div class="form-group">
    {!! Form::label('short_description', 'Short Description'); !!}
    {!! Form::textarea('short_description', null,['class' => 'form-control','rows' => 2]); !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description'); !!}
    {!! Form::textarea('description', null,['class' => 'form-control','rows' => 2]); !!}
</div>
<div class="form-group">
    {!! Form::label('specification', 'Specification'); !!}
    {!! Form::textarea('specification', null,['class' => 'form-control','rows' => 2]); !!}
</div>


