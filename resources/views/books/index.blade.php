@extends('layouts.app')
@section('sidebar')
    <div class="col-2">
        <div class="wrapper">
            <div class="sidebar">

{{--                <ul style="background-color: #d8d3bf">--}}
{{--                    <li style="background-color: #fff; border-radius: 0px 0px 15px 0px"><a href="{{ url('admin/dashboard') }}" style="text-decoration: none"><i class="fas fa-user"></i>@lang('message.user')</a></li>--}}
{{--                    <li class="active" style=" border-radius: 15px 0px 0px 15px;"><a href="{{ url('book/index') }}" style="text-decoration: none"><i class="fas fa-book"></i>@lang('message.Book')</a></li>--}}
{{--                    <li style="background-color: #fff; border-radius: 0px 15px 0px 0px"></li>--}}
{{--                </ul> --}}
                <ul>
                    <li><a href="{{ url('admin/dashboard') }}" style="text-decoration: none"><i class="fas fa-user"></i>@lang('message.user')</a></li>
                    <li class="active"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none"><i class="fas fa-book"></i>@lang('message.Book')</a></li>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="" style="margin-left:40px;background-color: #e8e5d1;border-radius: 0px;">
                            <a href="{{url('book/index')}}" style="text-decoration: none">@lang('message.All')</a>
                        </li>
                        <li style="margin-left:40px;background-color: #e8e5d1;border-radius: 0px;">
                            <a href="{{url('book/typeBook/3')}}" style="text-decoration: none">@lang('message.Comedy')</a>
                        </li>
                        <li style="margin-left:40px;background-color: #e8e5d1;border-radius: 0px;">
                            <a href="{{url('book/typeBook/2')}}" style="text-decoration: none">@lang('message.Drama')</a>
                        </li>
                        <li style="margin-left:40px;background-color: #e8e5d1;border-radius: 0px 0px 0px 10px;">
                            <a href="{{url('book/typeBook/1')}}" style="text-decoration: none">@lang('message.Horror')</a>
                        </li>
                    </ul>
                    <li class="slide" style="pointer-events: none"></li>
{{--                    <li "></li>--}}
{{--                    {{$json = json_decode($data)}}--}}
{{--                    @for ($i = 1; $i <= $datas; $i++)--}}
{{--                        <p>{{$data->main[$i]}}</p>--}}
{{--                    @endfor--}}
{{--                    <form METHOD="POST" action="{{ url('/book/temp') }}">--}}
{{--                        <input class="form-control" name="namecity" id="namecity" type="text" style="display:inline">--}}
{{--                        <input class="btn btn-primary" type="submit" >--}}
{{--                    </form>--}}
{{--                                    <p>{{$datas["main"]["temp"] - 273.5 .' ℃'}}</p>--}}


                </ul>

            </div>
        </div>
    </div>
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $('li').on('click',function () {--}}
{{--                $(this).siblings().removeClass('active');--}}
{{--                $(this).addClass('active');--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}

@stop
@section('content')

    <div class="col d-flex mea">

    @foreach($books as $key => $item)
            {{--            {{$key}}--}}
            {{--            <div class="container-card"> --}}

            <div class="container-card">
                <div class="data-index p-0">
                    <div class="post">

                        <div class="header_post">

                            <div class="w3-content w3-display-container">

                                @foreach($item->images as $image)
                                    <img class="mySlides" name="book-image[{{$key}}]"
                                         src="{{$image->image_path}}" style="width: 222px;height: 298px;border-radius: 10px 10px 0px 0px">
                                @endforeach


                                <button class="w3-button w3-black w3-display-left" name="btn-back-book-image[{{$key}}]"
                                        onclick="plusDivs(-1,{{$key}})" style="opacity: 0.3">&#10094;
                                </button>
                                <button class="w3-button w3-black w3-display-right" name="btn-next-book-image[{{$key}}]"
                                        onclick="plusDivs(1,{{$key}})" style="opacity: 0.3">&#10095;
                                </button>
                            </div>

                            {{--                                <img id="no-image" class="mySlides" name="book-image[{{$key}}]" src="/images/no-image-1.jpg" style="width: 222px;height: 200px;border-radius: 10px 10px 0px 0px">--}}


                        </div>
                        <div class="body_post">
                            <div class="post_content">
                                <div class="name-book">
                                    {{$item->name}}
                                </div>
                                <div class="container_infos">
                                    <div class="postedBy" style="display:inline">
{{--                                        <span>author</span>--}}
                                        <a href="{{ url('/book/show/' . $item->id) }}" title="View Book">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                   aria-hidden="true"> </i>
                                            </button>
                                        </a>
                                        <a href="{{ url('/book/edit/' . $item->id ) }}" title="Edit Book">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                      aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/book/destroy/' . $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)    "><i
                                                    class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="container_tags">
                                        <span>@lang('message.TAGS')</span>
                                        <div class="tags">
                                            <ul>
                                                <li>
                                                    <a href="{{ url('/book/typeBook/' . $item->type_id) }}" style="color: #222222;text-decoration: none;">@lang('message.'.$item->type->name)</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container-card-addbook">
            <div class="data-index d-flex justify" style="justify-content: center;align-items: center;opacity: 0.8">
                <a href="{{ url('/book/create') }}" class="btn btn-secondary d-flex justify" title="Add New Book"
                   style="width: 100px;height: 100px;border-radius: 50px;justify-content: center;align-items: center">
                    <i class="fa fa-plus" aria-hidden="true" style="font-size: 60px"></i>
                </a>
            </div>
        </div>

    </div>
@endsection
    {{--    </div>--}}
