@extends('layouts.mainuser')

@section('content')
    <div class="container2" style="width: 100%">
        <div class="row">


            <div class="col-4">
{{--                @foreach($books as $key => $item)--}}
                <div class="w3-content w3-display-container">

                    @foreach($books->images as $key => $image)
{{--                        @foreach($item->images as $image)--}}
                        <img class="mySlides" name="book-detail-image[{{$key}}]"
                             src="{{$image->image_path}}" style="width: 240px;height: 443px">

                    <button class="w3-button w3-black w3-display-left" name="btn-back-book-detail-image[{{$key}}]"
                            onclick="plusDivsBookdetail(-1,{{$key}})" style="opacity: 0.3">&#10094;
                    </button>
                    <button class="w3-button w3-black w3-display-right" name="btn-next-book-detail-image[{{$key}}]"
                            onclick="plusDivsBookdetail(1,{{$key}})" style="opacity: 0.3;right: -6%">&#10095;
                    </button>
                    @endforeach
                </div>
{{--                @endforeach--}}
            </div>


            <div class="col-8 p-0">


            <div class="card" style="margin: 0px 15px 0px">
                <div class="card-header">Book : {{ $books->name }}</div>
                <div class="card-body">

                    {{--                        <a href="{{ url('/books') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
                    {{--                        <a href="{{ url('/books/' . $book->id . '/edit') }}" title="Edit Book"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                    {{--                        <form method="POST" action="{{ url('books' . '/' . $book->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                    {{--                            {{ method_field('DELETE') }}--}}
                    {{--                            {{ csrf_field() }}--}}
                    {{--                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                    {{--                        </form>--}}
                    <a href="/welcome/{{auth()->user()->id}}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

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
                                <td> {{ $books->type->name }} </td>
                            </tr>
                            <tr>
                                <th> Price </th>
                                <td> {{ $books->price.' .-' }} </td>
                            </tr>
                            <tr>
                                <th> Stock </th>
                                <td> {{ $books->stock.' ea' }} </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th> Image </th>--}}
{{--                                <td>--}}
{{--                                    @foreach($books->images as $image)--}}
{{--                                        <img src="{{$image->image_path}}" style="width:80px;height:100px;border-radius: 10px;">&nbsp;--}}
{{--                                    @endforeach </td>--}}
{{--                            </tr>--}}

                            </tbody>
                        </table>
                        <a class="cart" href="{{ url('/cartbook/' . $books->id) }}" title="Back"><button class="btn btn-outline-success"style="height: 50px;width: 100px;margin-left: 37%;margin-top: 10px"><i class="fa fa-shopping-basket"
                                                                                                                 aria-hidden="true"></i> &nbsp;Buy</button></a>

                    </div>

                </div>
                {{--                </div>--}}
            </div>
            </div>
        </div>
    </div>
@endsection
