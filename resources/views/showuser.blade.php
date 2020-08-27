@extends('layouts.app')

@section('content')
    <div class="container2">
        <div class="row">
            {{--            @include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User {{ $users->id }}</div>
                    <div class="card-body">

                        {{--                        <a href="{{ url('/books') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
                        {{--                        <a href="{{ url('/books/' . $book->id . '/edit') }}" title="Edit Book"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                        {{--                        <form method="POST" action="{{ url('books' . '/' . $book->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                        {{--                            {{ method_field('DELETE') }}--}}
                        {{--                            {{ csrf_field() }}--}}
                        {{--                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                        {{--                        </form>--}}
                        <a href="{{ url('/admin/dashboard') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/edituser/' . $users->id )}}" title="Edit Book"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <a href='/admin/deleteUser/{{ $users->id }}' title="Delete User">
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Delete
                            </button>
                        </a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th> Profile </th>
                                    <td>
                                            <img src="{{$users->image}}" style="width:100px;height:100px;border-radius: 10px;">&nbsp;
                                </tr>
                                <tr>
                                    <th>ID</th><td>{{ $users->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $users->name }} </td>
                                </tr>
                                <tr>
                                    <th> Type User </th>
                                    <td> {{ \App\User::typeIntToString($users->type) }} </td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td> {{ $users->email }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
