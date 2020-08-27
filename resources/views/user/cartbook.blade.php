@extends('layouts.mainuser')

@section('content')

    <div class="container2" style="width: 100%">
        <div class="row">
            <div class="card" style="margin: 0px 15px 0px;width: 100%">
                <div class="card-header">@lang('message.Book Cart')</div>
                <div class="card-body">
                    <a href="{{ url('/welcome/'.auth()->user()->id) }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                  aria-hidden="true"></i> @lang('message.Back')
                        </button>
                    </a>
                    <br/>
                    <br/>
                    @if($count !=0 )

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr style="text-align: center">
                                    <th style="text-align: left">ID</th>
                                    <th style="text-align: left">@lang('message.Book Name')</th>
                                    <th> @lang('message.Quantity')</th>
                                    <th> @lang('message.Day')<br>(@lang('message.limit 7 Days'))</th>
                                    <th> @lang('message.Price')<br>(@lang('message.Bath'))</th>
                                    <th> Option price</th>
                                    <th> @lang('message.Action')</th>
                                </tr>

                                @foreach( $cartItem as $key => $book)
                                    <tr class="row-data">
                                        <td>{{$book->books_id}}</td>
                                        {{--                                    <td><img src="{{$book->$image->image_path}}" style="width: 70px;height: 70px;border-radius: 10px"></td>--}}
                                        <td>{{$book->name}}</td>
                                        <td style="text-align: center">
                                            {{--                                        <input class="quantity" type="number" placeholder=" Stock = {{$book->quantity}}" min="1"--}}
                                            {{--                                                                          max="{{$book->quantity}}" data-number="1" value="1" style="width: 70px"></td>--}}
                                            <input class="quantity{{$key+1}}" type="text"
                                                   placeholder=" Stock = {{$book->quantity}} " min="1"
                                                   maxlength="2" data-number="1" value="1" style="width: 70px">
                                        </td>
                                        {{--                                    &nbsp;@lang('message.Stock') = {{$book->quantity}}--}}
                                        <td style="text-align: center"> {{$book->num_day}} day
{{--                                            <form METHOD="POST" action="acceptBuy/">--}}
{{--                                                <input id="day" type="number" placeholder=" limit 7 days" min="1"--}}
{{--                                                       max="7" style="width: 100px">--}}
                                        </td>
                                        <td class="book-price{{$key+1}}">{{$book->price}}</td>
                                        <td><input type="text" name="" id="option-price{{$key+1}}"
                                                   class="text-center css_input_total"
                                                   style="width:50px;border: none;border-color: transparent;"
                                                   value="0.00" readonly>
                                                        
                                        </td>
                                        <td style="text-align: center">
                                            <form method="POST" action="{{ url('destroyBookInCart/' . $book->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">

                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Book"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)    "><i
                                                        class="fa fa-times"
                                                        aria-hidden="true"></i> @lang('message.Cancel')
                                                </button>
                                            </form>
{{--                                            <a href="destroyBookInCart/{{$book->id}}" data-method="DELETE" title="Buy">--}}
{{--                                                                                                                                           {{ method_field('DELETE') }}--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Book"--}}
{{--                                                        onclick="return confirm(&quot;Confirm delete?&quot;)    "><i--}}
{{--                                                        class="fa fa-times"--}}
{{--                                                        aria-hidden="true"></i> @lang('message.Cancel')--}}
{{--                                                </button>--}}
{{--                                            </a>--}}
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td style="text-align: center">@lang('message.Total')</td>
                                    <td id="total"></td>
                                </tr>

                                </tbody>
                            </table>


                            {{--                        onclick="return check()"--}}
{{--                            <input type="submit" class="btn btn-outline-success"style="height: 50px;width: 100px;margin-left: 43%;margin-top: 10px;font-size: 20px"><i--}}
{{--                                class="fa fa-usd"--}}
{{--                                aria-hidden="true"></i> &nbsp;Pay--}}

                            <a href="/acceptBuy" title="Buy">
                                <button class="btn btn-outline-success"
                                        style="height: 50px;width: 100px;margin-left: 43%;margin-top: 10px;font-size: 20px">
                                    <i
                                        class="fa fa-usd"
                                        aria-hidden="true"></i> &nbsp;Pay
                                </button>
                            </a>

                        </div>
{{--                        </form>--}}
                    @elseif($count ==0)

                        <div class="no-book-in-cart"> No book in cart !! please choose at least 1 book
                        </div>
                    @endif

                </div>
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">

        var total = 0;
        $(document).ready(function () {
            $('tr').each(function () {

                $(this).find('.book-price').each(function () {
                    var price = $(this).text();
                    //price =
                    if (price.lenght !== 0) {
                        total += parseInt(price);
                        // console.log(total);
                    }
                });
                $(this).find('#total').html(total + ' .-');
            });

        });


        //  +++++++++++++++++++++++++++++++++ update value price
        var count_quantity = document.getElementsByClassName("row-data").length;
        console.log(count_quantity);
        var j = 1;
        // for (j = 1; j <= count_quantity; j++) {
        $(function () {

            for (j = 1; j <= count_quantity; j++) {
                // ฟังก์ชั่นสำหรับค้นและแทนที่ทั้งหมด
                String.prototype.replaceAll = function (search, replacement) {
                    var target = this;
                    return target.replace(new RegExp(search, 'g'), replacement);
                };

                var formatMoney = function (inum) {  // ฟังก์ชันสำหรับแปลงค่าตัวเลขให้อยู่ในรูปแบบ เงิน 
                    var s_inum = new String(inum);
                    var num2 = s_inum.split(".");
                    var n_inum = "";
                    if (num2[0] != undefined) {
                        var l_inum = num2[0].length;
                        for (i = 0; i < l_inum; i++) {
                            if (parseInt(l_inum - i) % 3 == 0) {
                                if (i == 0) {
                                    n_inum += s_inum.charAt(i);
                                } else {
                                    n_inum += "," + s_inum.charAt(i);
                                }
                            } else {
                                n_inum += s_inum.charAt(i);
                            }
                        }
                    } else {
                        n_inum = inum;
                    }
                    if (num2[1] != undefined) {
                        n_inum += "." + num2[1];
                    }
                    return n_inum;
                }

                var res = (".quantity").concat(j);
                var sum = ("#option-price").concat(j);
                var bprice = (".book-price").concat(j);

                // อนุญาติให้กรอกได้เฉพาะตัวเลข 0-9 จุด และคอมม่า
                $(res).on("keypress", function (e) {
                    var eKey = e.which || e.keyCode;
                    if ((eKey < 48 || eKey > 57) && eKey != 46 && eKey != 44) {
                        return false;
                    }
                });

                console.log(sum);
                console.log("resssssss" + res);

                // ถ้ามีการเปลี่ยนแปลง textbox ที่มี css class ชื่อ css_input1 ใดๆ
                $(res).on("change", function () {
                    console.log('aaaaaaaaaaaaaaa');
                    var thisVal = $(this).val(); // เก็บค่าที่เปลี่ยนแปลงไว้ในตัวแปร
                    if (thisVal.replace(",", "")) { // ถ้ามีคอมม่า (,)
                        thisVal = thisVal.replaceAll(",", ""); // แทนค่าคอมม่าเป้นค่าว่างหรือก็คือลบคอมม่า
                        thisVal = parseInt(thisVal);  // แปลงเป็นรูปแบบตัวเลข                    
                    } else { // ถ้าไม่มีคอมม่า
                        thisVal = parseInt(thisVal); // แปลงเป็นรูปแบบตัวเลข         
                    }
                    // thisVal=thisVal.toFixed(2);// แปลงค่าที่กรอกเป้นทศนิยม 2 ตำแหน่ง
                    $(this).data("number", thisVal); // นำค่าที่จัดรูปแบบไม่มีคอมม่าเก็บใน data-number
                    $(this).val(formatMoney(thisVal));// จัดรูปแบบกลับมีคอมม่าแล้วแสดงใน textbox นั้น

                    var total_sum_data = $(bprice).text(); // ทุกครั้งที่มีการเปลี่ยนแปลงค่า textbox ให้ค่ารวมเป็น 0
                    total_sum_data = parseInt(total_sum_data);
                    console.log(total_sum_data);
                    // $(".quantity").each(function(i,k){ //  วนลูป textbox
                    // นำค่าใน data-number ซื่องไม่มีคอมม่า มาไว้ในตัวแปร สำหรับ บวกเพิ่ม
                    var data_item = $(res).data("number");
                    console.log(data_item);
                    // บวกค่า data_item เข้าไปในผลรวม total_sum_data
                    total_sum_data = parseInt(total_sum_data) * parseInt(data_item);
                    // });
                    // total_sum_data=total_sum_data.toFixed(2); // จัดรูปแบบแปลงทศนิยมเป็น 2 ตำแหน่ง
                    // จัดรูปแบบกลับมีคอมม่าแล้วแสดงใน textbox ที่เป็นผลรวม
                    $(sum).val(formatMoney(total_sum_data));

                    console.log(total_sum_data);
                });
                $(res).trigger("change");// กำหนดเมื่อโหลด ทำงานหาผลรวมทันที

                //     $(document).ready(function () {
                //         $('tr').each(function () {
                //
                //             $(this).find(sum).each(function () {
                //                 var price = $(this).text();
                //                 //price =
                //                 if (price.lenght !== 0) {
                //                     total += parseInt(price);
                //                     // console.log(total);
                //                 }
                //             });
                //             $(this).find('#total').html(total + ' .-');
                //         });
                //
                //     });
            }
        });
        // }
    </script>
    </div>

@endsection
