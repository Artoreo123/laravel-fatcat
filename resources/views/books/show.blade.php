@extends('layouts.app')

@section('content')
    <div class="container2">
        <div class="row">
{{--            @include('admin.sidebar')--}}

{{--            <div class="col-md-12">--}}
                <div class="card" style="margin: 0px 15px 0px">
                    <div class="card-header">Book {{ $books->id }}</div>
                    <div class="card-body">

{{--                        <a href="{{ url('/books') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
{{--                        <a href="{{ url('/books/' . $book->id . '/edit') }}" title="Edit Book"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

{{--                        <form method="POST" action="{{ url('books' . '/' . $book->id) }}" accept-charset="UTF-8" style="display:inline">--}}
{{--                            {{ method_field('DELETE') }}--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
{{--                        </form>--}}
                        <a href="{{ url('/book/index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/book/edit/' . $books->id )}}" title="Edit Book"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('/book/destroy/' . $books->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $books->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $books->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Type Id </th>
                                        <td> {{ $books->type_id }} &nbsp;:&nbsp; {{ $books->type->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Image </th>
                                        <td>
                                            @foreach($books->images as $image)
                                                <img src="{{$image->image_path}}" style="width:80px;height:100px;border-radius: 10px;">&nbsp;
                                            @endforeach </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
