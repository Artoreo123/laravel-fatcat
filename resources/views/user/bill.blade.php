@extends('layouts.mainuser')

@section('content')
    <div class="container2" style="width: 100%">
        <div class="row">


            <div class="card" style="margin: 0px 15px 0px;width: 100%">
                <div class="card-header">Book</div>
                <div class="card-body">
                    <br/>

                    <div class="table-responsive">

                        <table class="table">
                            <tbody>
                            <tr style="text-align: center">
                                <th style="text-align: left">ID</th>
                                <th style="text-align: left">Name</th>
                                <th> Quantity</th>
                                <th> Day</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td style="text-align: center">Total</td>
                                <td id="total"></td>
                            </tr>

                            </tbody>
                        </table>
                        <a href="/welcome/{{auth()->user()->id}}" title="Back">
                            <button class="btn btn-outline-success"
                                    style="height: 50px;width: 130px;margin-left: 43%;margin-top: 10px;font-size: 20px">
                                Success
                            </button>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
