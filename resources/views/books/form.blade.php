<div class="form-group">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($books->name) ? $books->name : ''}}" >

</div>
<div class="form-group">
    <label for="type_id" class="control-label">{{ 'Type Movie' }}</label>
{{--    <input class="form-control {{ $errors->has('type_id') ? 'is-invalid' : ''}}" name="type_id" type="number" id="type_id" value="{{ $items = Items::all(['id', 'name']);}}" >--}}
{{--    {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}--}}
    <select class="form-control" name="type_id" id="types">
            @foreach($types as $key => $value )
                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
            @endforeach
    </select>


</div>
{{--<form action="" method="post" enctype="multipart/form-data">--}}
{{--    <input type="file" name="file" />--}}
{{--</form>--}}

<div class="form-group ">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
