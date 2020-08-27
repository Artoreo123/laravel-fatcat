@extends('layouts.mainuser')
@section('sidebar')
    <div class="col-2">
        <div class="wrapper">
            <div class="sidebar">

                <ul>
                    <li class="">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none">
                            <i class="fas fa-book"></i>@lang('message.Book')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>
                    {{--                     <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>--}}
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="" style="margin-left:40px;background-color: #e8e5d1;">
                            <a href="{{url('/welcome/'.auth()->user()->id)}}" style="text-decoration: none">@lang('message.All')</a>
                        </li>
                        @foreach($typeBook as $typename)
                            <li style="margin-left:40px;background-color: #e8e5d1">
                                <a href="/welcome/{{auth()->user()->id}}/typeBook/{{$typename->id}}" style="text-decoration: none">@lang('message.'.$typename->name)</a>
                            </li>
                        @endforeach
                    </ul>
                    <li class="active"><a href="#" style="text-decoration: none"><i class="fas fa-history"></i>@lang('message.History')</a></li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="col-10">
    <div class="container2" style="margin-left: 0;margin-right: 60px">
        <div class="row">


            <div class="card" style="margin: 0px 15px 0px;width: 100%">
                <div class="card-header">@lang('message.History Borrow Book')</div>
                <div class="card-body">

                    <br/>
                    <br/>

                    @if($count!=0)
                    <div class="table-responsive">

                        <table class="table">
                            <tbody>
                            <tr style="text-align: center">
                                <th style="text-align: left">ID</th>
                                <th style="text-align: left">@lang('message.Book Name')</th>
                                <th> @lang('message.Quantity')</th>
                                <th> Day</th>
                                <th> @lang('message.Borrow date')</th>
                                <th> @lang('message.Send back')</th>
                                <th style="text-align: left"> @lang('message.Price')<br>(@lang('message.Bath'))</th>
{{--                                <th> @lang('message.Price')<br>(@lang('message.Bath'))</th>--}}
                                <th> @lang('message.Action')</th>
                            </tr>
{{--                            {{ $object->created_at->format('d M') }}--}}
                            @foreach( $cartItemOld as $book)
                                <tr style="text-align: center">
                                    <td style="text-align: left">{{$book->books_id}}</td>
                                    {{--                                    <td><img src="{{$book->$image->image_path}}" style="width: 70px;height: 70px;border-radius: 10px"></td>--}}
                                    <td style="text-align: left">{{$book->name}}</td>
                                    <td>..</td>
                                    <td>{{$book->num_day}} day</td>
                                    <td>{{$book->start_borrow}}</td>
                                    <td>{{$book->send_back}}</td>
{{--                                    <td style="text-align: center"><input id="day" type="number" value="1" min="1"--}}
{{--                                                                          max="7" style="width: 50px"></td>--}}
                                    <td class="book-price">{{$book->price.' .-'}}</td>
                                    <td style="text-align: center">
                                        <form method="POST" action="{{ url('destroyBookInCart/' . $book->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)    "><i
                                                    class="fa fa-times" aria-hidden="true"></i> Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center">@lang('message.Total')</td>
                                <td id="total"></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    @elseif($count==0)
                        <div class="no-book-in-cart"> No history borrow book !
                        </div>
                    @endif

                </div>
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var total = 0;
        $(document).ready(function () {
            $('tr').each(function () {

                $(this).find('.book-price').each(function () {
                    var price = $(this).text();
                    //price =
                    if (price.lenght !== 0) {
                        total += parseInt(price);
                        console.log(total);
                    }
                });
                $(this).find('#total').html(total + ' .-');
            });

        });
    </script>
    </div>
    </div>

@endsection
