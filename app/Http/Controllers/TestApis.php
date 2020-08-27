<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class TestApis extends Controller
{
    public function test()
    {
//        return Http::get('api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=9226067b44d78f9290896fedede6c640');
        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=London&appid=9226067b44d78f9290896fedede6c640')->json();
//        $data = json_decode($json);
//        dd($data);

        return view('books.index')->with(['datas'=>$response]);;

    }


}
