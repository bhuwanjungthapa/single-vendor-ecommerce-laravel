{{--<div class="form-group">
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
    {!!Form::label('subcategory_id','subcategory')!!}
    {!!Form::select ('subcategory_id',$data['subcategories'],null,['class'=> 'form-control'])!!}
</div>

{{--<div class="form-group">
    <label for="title">Sub Category</label>
    <select class="form-control" id="subcategory_id " name="subcategory_id" >
        @foreach($data['subcategories'] as $record)
            <option value="{{$record->id}}">{{$record->title}}</option>
        @endforeach

    </select>
</div>--}}

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
    {!!Form::label('status','Status')!!} <br>
    {!!Form::radio('status',1)!!}Active<br>
    {!!Form::radio('status',0,true)!!}Deactive
</div>
<div class="form-group">
    {!!Form::label('specification','Specification')!!}
    {!!Form::text('specification',null,['class'=> 'form-control','placeholder'=>'Specification'])!!}
</div>
<div class="form-group">
    {!!Form::label('description','Description')!!}
    {!!Form::text('description',null,['class'=> 'form-control','placeholder'=>'Description'])!!}
</div>
<div class="form-group">
    {!!Form::label('price','Price')!!}
    {!!Form::number('price',null,['class'=> 'form-control','placeholder'=>'Price'])!!}
</div>
<div class="form-group">
    {!!Form::label('discount','Discount')!!}
    {!!Form::number('discount',null,['class'=> 'form-control','placeholder'=>'Discount'])!!}
</div>
<div class="form-group">
    {!!Form::label('stock','Stock')!!}
    {!!Form::number('stock',null,['class'=> 'form-control','placeholder'=>'Stock'])!!}
</div>
<div class="form-group">
    {!!Form::label('quantity','Quantity')!!}
    {!!Form::text('quantity',null,['class'=> 'form-control','placeholder'=>'Quantity'])!!}
</div>
<div class="form-group">
    {!!Form::label('flash_key','Flash Key')!!}<br>
    {!!Form::radio('flash_key',1)!!}Active<br>
    {!!Form::radio('flash_key',0,true)!!}Deactive
</div>
<div class="form-group">
    {!!Form::label('hot_key','Hot Key')!!}<br>
    {!!Form::radio('hot_key',1)!!}Active<br>
    {!!Form::radio('hot_key',0,true)!!}Deactive
</div>
