<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    //
    protected $guarded=[];
    protected $table = 'book_images';
    //public $timestamps = false;


    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'image_path','books_id','updated_at','created_at'];

    public function books(){
        return $this->hasOne('App\Books','id','books_id');
    }

}
