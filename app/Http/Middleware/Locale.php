<?php


namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Locale
{
//    public function handle($request, Closure $next) // รับคำสั่งและลำดับการทำงาน
//    {
//        if(Session::has('locale')) // ตรวจดูว่ามีตัวแปร locale ใน session หรือไหม่
//        {
//            $locale = Session::get('locale'); // ถ้ามีอยู่ก็ดึงค่าออกมาเก็บไว้
//            App::setLocale($locale); // ตั้งค่าที่ได้รับมาให้เป็นภาษาหลัก
//        }
//        return $next($request); // ทำตามคำสั่งในลำดับต่อไป
//    }
    public function handle($request, Closure $next)
    {
        if(session()->has('locale') && in_array(session()->get('locale'),['en','th']))
        {
            app()->setLocale(session()->get('locale'));
        }
        else
        {
            session()->put('locale','en');
        }
        return $next($request);
    }
}


