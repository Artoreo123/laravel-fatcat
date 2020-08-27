@extends('layouts.app')
@section('sidebar')
    <div class="col-2">
        <div class="wrapper">
            <div class="sidebar">
                <ul>
                    <li class="active"><a href="{{ url('admin/dashboard') }}" style="text-decoration: none"><i class="fas fa-user"></i>User</a></li>
                    <li><a href="{{ url('book/index') }}" style="text-decoration: none"><i class="fas fa-book"></i>Book</a></li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="col data-index">
{{--<div class="container1">--}}
{{--    <div class="row">--}}

{{--        <div class="col-md-12">--}}
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body" style="padding-bottom: 0px">
                    <a href="{{ url('admin/createuser') }}" class="btn btn-success btn-sm" title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add User
                    </a>

                    <form method="GET" action="{{ url('admin/dashboard') }}" accept-charset="UTF-8"
                          class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..."
                                   value="{{ request('search') }}">
                            <span class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                            </span>
                        </div>
                    </form>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type User</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userData['data'] as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ \App\User::typeIntToString($user->type) }}</td>
                                    <td>

                                            <!-- Message -->
{{--                                            @if(Session::has('message'))--}}
{{--                                                <p>{{ Session::get('message') }}</p>--}}
{{--                                            @endif--}}
                                            <a href="{{ url('admin/showuser/' . $user->id) }}" title="View User">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i> View
                                                </button>
                                            </a>

                                            <a href="{{ url('admin/edituser/' . $user->id ) }}" title="Edit User">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                          aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
{{--                                        <form method='post' action='/admin/save'style="display:inline">--}}
{{--                                        </form>--}}
                                        <a href='/admin/deleteUser/{{ $user->id }}' title="Delete User">
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fa fa-trash"
                                                   aria-hidden="true"></i> Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                        <div class="pagination-wrapper"> {!! $books->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                    </div>

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
                </div>
    </div>
</div>
@endsection

{{--</body>--}}
{{--</html>--}}
