<?php


namespace App\Http\Controllers;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests;


use App\Books;
use App\Page;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

use Session;


class UsersController extends Controller
{
    public function index(Request $request,$iduser)
    {
        $keyword = $request->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $books = Books::oldest()->where('name', 'like', '%' . $keyword . '%')->paginate($perPage);// WHERE LIKE !!!
        } else {
//            $books = Books::oldest()->orderBy('id')->paginate($perPage);
            $books = Books::orderBy('id','ASC')->get();
        }
        //$books = $books->toArray();
        //++++++++++++++++++ typebook
        $typeBook = Type::all();
//        dd($typeBook);
        //++++++++++++++++++ count item in cart
        $countRow = Cart::where('users_id', '=', $iduser)
            ->where('status', '1')
            ->get();
        $wordCount = $countRow->count();
        //$books['data'] = array_reverse($books['data'], true);
//        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=Khonkaen&appid=9226067b44d78f9290896fedede6c640')->json();

        return view('user.welcome')->with(['typeBook'=>$typeBook,'books' => $books,'count'=>$wordCount]);
        //return view('books.index', compact('books'));
    }
    public function typeBook($iduser,$typeid)
    {
//        dd($iduser);
        $countRow = Cart::where('users_id', '=', $iduser)
            ->where('status', '1')
            ->get();
        $wordCount = $countRow->count();

        $books = Books::where('type_id',$typeid)->orderBy('id','ASC')->get();

        $typeBook = Type::all();

        return view('user.welcome')->with(['typeBook'=>$typeBook,'books' => $books,'count'=>$wordCount]);
//        $books = Books::where('type_id',$typeid)->orderBy('id','ASC')->get();

//        return view('user.welcome', compact('books'));
    }
    public function detailbook($id)
    {

        $books = Books::findOrFail($id);
//        $types = Typies::all();

        return view('user.detailbook')->with(['books' => $books]);
//        return view('books.show', compact('books'));
//        return view('directory.book.show', compact('book'));
    }
    public function editprofile($id)
    {
        $users = User::findOrFail($id);
        // return view('edituser')->with(['users' => $users]);

        return view('user.editprofile')->with(['users' => $users]);

    }
    public function updateProfileUser(Request $request)
    {
//        dd($request);
        if ($request->input('submit') != null) {
            // Update record
//            dd($request->get('editid'));
            if ($request->input('editid') != null) {
                $name = $request->input('name');
                $email = $request->input('email');
                $password = $request->input('password');
                $editid = $request->input('editid');

                $password = Hash::make($password);

                if ($name != '' && $email != '' && $name != '' && $password != '') {
                    $data = array('name' => $name, 'email' => $email, 'password' => $password);
                    // Update
                    Page::updateData($editid, $data);
//                    Session::flash('message','Update successfully.');
                }
            }
        }

        return redirect()->action('UsersController@index');
    }
    public function uploadImageProfile($id, Request $request)
    {
        $users = User::findOrFail($id);
        //$value = DB::table('users')->where('image',$users['image'])->get();
//        if ($value->count() == 1) {
//                    dd($request->get($users['image']));
        if (true) {
            $image = $request->file('file');
            if ($image) {
                $imageName = time() . $image->getClientOriginalName();
                $image->move('images', $imageName);
                $imagePath = "/images/$imageName";
                //insert Image
                $data = (['image' => $imagePath]);
                Page::updateData($id, $data);

                if ($users['image'] !=""){
                    $image_path = public_path().'/'.$users->image;
                    unlink($image_path);
                }
//                $users['image']->update( $imagePath);
                return "doneeeeeeeeeeeeeeeeeeeeeeeeee !";
            } else {
//                return $value->count()." !!!";
                return "can't upload !!!!!!!";
            }
        }
        else return "can't upload !!!!!!!";
    }
    public function selectbook(){

        return view('user.basketbook');
    }

}
