<?php

namespace App\Http\Controllers;

use App\Type;
use App\Cart;
use App\Books;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function inCart($iduser){
        $cartItem = Cart::select('id','books_id','name','price','quantity','num_day')
            ->where('users_id', '=', $iduser)
            ->where('status', '1')
            ->get();

        $countRow = Cart::where('users_id', '=', $iduser)
            ->where('status', '1')
            ->get();
        $wordCount = $countRow->count();
        return view('user.cartbook')->with(['cartItem'=>$cartItem,'count'=>$wordCount]);
//
//        return view('user.cartbook',compact('cartItem'));
    }
    //

    public function addCart($idBook,$day){

        $databook = Books::findOrFail($idBook);
        $startDate = time();
        $data = array(
            'books_id'=> $databook->id,
            'users_id' => auth()->user()->id,
            'name'=> $databook->name,
            'price'=> $databook->price,
            'quantity'=> $databook->stock,
            'num_day' => $day,
            'start_borrow' =>date('Y-m-d H:i:s',$startDate),
//            'start_borrow' => date_format( $startDate,'d/m/Y H:i:s' ),
//            'send_back' => date('Y-m-d H:i:s', strtotime('+'.$day.' day',$startDate)),
            'status' => 1,

        );
//        Cart::create($data);
        DB::table('carts')->insert($data);
        return back();
    }

    public function acceptBuy(){
        $iduser = auth()->user()->id;
        $day = Cart::select('num_day')
            ->where('users_id', '=', $iduser)
            ->where('status', '1')
            ->get();

        $startDate = time();
        DB::table('carts')
            ->where('users_id', $iduser)
//            ->where('start_borrow', $startDate)
            ->update([
                'status' => 0,
//                'start_borrow' => date('Y-m-d H:i:s',$startDate),
//                'send_back' => date('Y-m-d H:i:s', strtotime('+'.$day.' day',$startDate))
            ]);

        return redirect('/bill')->with('success', 'Data is successfully updated');
    }
    public function bill(){


//        DB::table('carts')
//            ->where('users_id', $iduser)
//            ->update(['send_back' => date('Y-m-d H:i:s', strtotime($Date. ' + 2 days'))]);
        return view('user.bill');
    }

    public function destroyBookInCart($id){
//        $books = Cart::findOrFail($id);
//        $books->delete();

//        DB::table('carts')
//            ->where('books_id', $id)
//            ->delete();

        Cart::destroy($id);
        return back();
    }
    public function history($iduser){
        $cartItemOld = Cart::select('id','books_id','name','price','quantity','num_day','start_borrow','send_back')
            ->where('users_id', '=', $iduser)
            ->where('status', '0')
            ->orderBy('start_borrow','DESC')
            ->get();
        $typeBook = Type::all();

        $countRow = Cart::where('users_id', '=', $iduser)
            ->where('status', '0')
            ->get();
        $wordCount = $countRow->count();

        return view('user.history')->with(['typeBook'=>$typeBook,'cartItemOld' => $cartItemOld,'count' => $wordCount]);
//
//        return view('user.history',compact('cartItemOld'));
    }
}
