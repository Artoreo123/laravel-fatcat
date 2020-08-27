<div class="form-group">

    <label for="name" class="control-label">{{ 'ID' }}</label>
    <input class="form-control" name="editid" type="id" id="editid" value="{{ isset($users->id) ? $users->id : ''}}"  readonly>
    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" type="text" id="name" value="{{ isset($users->name) ? $users->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email" type="text" id="email" value="{{ isset($users->email) ? $users->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" name="password" type="text" id="password">{{--value="{{ isset($users->password) ? $users->password : '' }}" readonly--}}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group ">
    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Update">
</div>
