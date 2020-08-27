<div class="form-group">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" type="text" id="name">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email" type="text" id="email">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" name="password" type="text" id="password">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="type" class="control-label">{{ 'Types' }}</label>
    <select class="form-control" name="type" id="users">

        <option value="0">{{ \App\User::typeIntToString(0) }}</option>
        <option value="1">{{ \App\User::typeIntToString(1) }}</option>
    </select>
</div>
<div class="form-group ">
    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Create">
</div>
