<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Page extends Model
{
    public static function getuserData($id=0){

        if($id==0){
            $value=DB::table('users')->orderBy('id', 'asc')->get();
        }else{
            $value=DB::table('users')->where('id', $id)->first();
        }
        return $value;
    }

    public static function insertData($data){
        $value=DB::table('users')->where('name', $data['name'])->get();
        if($value->count() == 0){
            DB::table('users')->insert($data);
            return 1;
        }else{

            return 0;
        }
    }

    public static function updateData($id,$data){
        DB::table('users')
            ->where('id', $id)
            ->update($data);
       // if ($users['image']==""){
//                    $image_path = public_path().'/'.$users->image;
//                    unlink($image_path);
//                }
    }

    public static function deleteData($id){
        DB::table('users')->where('id', '=', $id)->delete();
    }

}
