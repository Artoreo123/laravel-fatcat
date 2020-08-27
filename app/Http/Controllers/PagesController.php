<?php

namespace App\Http\Controllers;

use App\Books;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Symfony\Component\HttpFoundation\Session\Session;
use Session;
use App\Page;

class PagesController extends Controller
{

    public function index(Request $request,$id=0){

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $userData['data'] = User::latest()->where('name','like','%'.$keyword.'%')->paginate($perPage);// WHERE LIKE !!!
        } else {
            $userData['data'] = Page::getuserData();
        }
        // Fetch all records
//        $userData['data'] = Page::getuserData();
        $userData['edit'] = $id;

        // Fetch edit record
        if($id>0){
            $userData['editData'] = Page::getuserData($id);
        }
        // Pass to view
        return view('index')->with(['userData' => $userData]);
    }

    public function save(Request $request){
//dd($request->get('submit'));
        if ($request->input('submit') != null ){
            // Update record
            //dd($request->get('editid'));
            if($request->input('editid') !=null ){
                $name = $request->input('name');
                $type = $request->input('type');
                $email = $request->input('email');
//                $password = $request->input('password');
                $editid = $request->input('editid');

                if($name !='' && $email != '' && $type !='' && $name !='' ){
                    $data = array('name'=>$name,'type' => $type,'email'=>$email);
                    // Update
                    Page::updateData($editid, $data);
//                    Session::flash('message','Update successfully.');
                }
            }else{ // Insert record
                $name = $request->input('name');
                $type = $request->input('type');
                $email = $request->input('email');
                $password =  Hash::make($request->input('password'));

                if($name !='' && $type !='' && $password != ''&& $email != ''){
                   $data = array('name'=>$name, 'type'=>$type,'email'=>$email,'password'=>$password );
                    // Insert
                    //return json_encode($data);
                    //Page::create($data);
                    Page::insertData($data);
                    /*if($value){
                        Session::flash('message','Insert successfully.');
                    }else{
                        Session::flash('message','Username already exists.');
                    }*/
                }
            }
        }
        return redirect()->action('PagesController@index',['id'=>0]);
    }

    public function deleteUser($id=0){

        if($id != 0){
            // Delete
            Page::deleteData($id);

            Session::flash('message','Delete successfully.');

        }
        return redirect()->action('PagesController@index',['id'=>0]);
    }
    public function createuser()
    {
        $users = User::all();
//        return json_encode($users);
        return view('createuser')->with(['users' => $users]);

//        return view ('books.create', compact('items'));

    }
    public function showuser($id)
    {
        $users = User::findOrFail($id);
        return view('showuser')->with(['users' => $users]);
    }
    public function edituser($id)
    {
        $users = User::findOrFail($id);
        // return view('edituser')->with(['users' => $users]);
        $types = User::all();
        return view('edituser')->with(['users' => $users,'types' => $types]);

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
//    public function login($id=0){
//        return view('/auth/login');
//    }
}
