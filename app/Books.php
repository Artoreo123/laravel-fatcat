<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';
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
    protected $fillable = ['id', 'name','type_id','image','price','stock','created_at'];

    public function type()
    {
//        return $this->belongsTo('App\Type');
        return $this->hasOne('App\Type','id','type_id');
    }
    public function images()
    {
        return $this->hasMany('App\BookImage');
    }
    public function cart()
    {
        return $this->hasMany('App\Cart');
    }
}
