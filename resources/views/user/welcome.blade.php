@extends('layouts.mainuser')
@section('sidebar')
    <div class="col-2">
        <div class="wrapper">
            <div class="sidebar">

                <ul>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                           style="text-decoration: none">
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
                    <li>
                        <a href="{{ url('/myHistory/'.Auth::user()->id) }}" style="text-decoration: none"><i
                                class="fas fa-history"></i>@lang('message.History')</a>
                    </li>

                    {{--                     <p>{{$datas["main"]["temp"] - 273.5 .' ℃'}}</p>--}}

                </ul>
            </div>
        </div>
    </div>

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
                                <a href="{{ url('/detailbook/' . $item->id) }}" title="View Book" >
                                @foreach($item->images as $image)
                                    <img class="mySlides" name="book-image[{{$key}}]"
                                         src="{{$image->image_path}}"
                                         style="width: 222px;height: 298px;border-radius: 10px 10px 0px 0px">
                                @endforeach

                                </a>
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
{{--                                <div class="container_tags">--}}
{{--                                    <span>@lang('message.TAGS')</span>--}}
{{--                                    <div class="tags">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="{{ url('/typeBook/' . $item->type_id) }}"--}}
{{--                                                   style="color: #222222;text-decoration: none;">@lang('message.'.$item->type->name)</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="container_infos">

                                    <div class="postedBy" style="display:inline">

                                        {{--                                        <span>author</span>--}}

{{--                                        <div class="price-book">--}}
{{--                                            {{$item->price}}--}}
{{--                                        </div>--}}
{{--                                        <form method="POST" action="{{ url('/cartbook/' . $item->id.'/'.auth()->user()->id) }}">--}}
{{--                                            @csrf--}}
{{--                                            <input id="stock" type="number" value="1" min="1"--}}
{{--                                                   max="{{$item->stock}}">--}}
{{--                                            <button class=" btn btn-outline-success " style="font-size: 18px"><i--}}
{{--                                                                                                class="fa fa-shopping-basket"--}}
{{--                                                                                                aria-hidden="true"></i> Buy--}}
{{--                                                                                        </button>--}}
{{--                                        </form>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{ url('/addCart/' . $item->id )}}" title="Borror Book">--}}

                                            <button id="add-cart" class="btn btn-outline-success"value="{{$item->id}}" style="width: 70px;height: 36px;border-radius: 0 18px 18px 0;"><i
                                                    class="fa fa-shopping-basket"
                                                    aria-hidden="true" ></i> Add
                                            </button>
{{--                                        </a>--}}

                                    </div>
                                    <div class="container_tags">

                                        <span>@lang('message.TAGS')</span>
                                        <div class="tags">
                                            <ul>
                                                <li>
{{--                                                    <a href="{{ url('/typeBook/' . $item->type_id) }}"--}}
                                                    <a href="/welcome/{{auth()->user()->id}}/typeBook/{{$item->type_id}}"
                                                       style="color: #222222;text-decoration: none;">@lang('message.'.$item->type->name)</a>
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
        <a href="/cartbook/{{auth()->user()->id}}" title="Borror Book">
            <div class="demo bottomright">
                <i class="fa fa-shopping-basket fa-3x" aria-hidden="true" style="color: #28a745"></i>
{{--                php + echo user "<?= ?> "--}}
                <?= $count != 0?"<div class='count-row-cart'>".$count."</div>":""?>
            </div>
        </a>

    </div>
<script type="text/javascript">
    $(document).delegate('#add-cart', 'click', function () {
        let val = $(this).val();
        console.log(val);
        Swal.fire({
            text: 'How many days do you borrow?',
            input: 'number',
            inputPlaceholder: 'Limit 7 day',
        }).then(function(result) {
            if (result.value) {
                const amount = result.value
                Swal.fire(amount + ' day').then(function(){

                    $.ajax({
                        url:'/addCart/'+val+'/'+amount,
                        method:"GET",
                        // data:{name:name},
                        success:function()
                        {
                            location.reload();
                        }
                    })
                })
            }
        })
    });
</script>


@endsection
{{--    </div>--}}
