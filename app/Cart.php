<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carts';
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
    protected $fillable = ['id', 'books_id' ,'name','price','quantity','num_day','status','updated_at'];

    public function books(){
        return $this->hasOne('App\Books','id','books_id');
    }
    public function user(){
        return $this->hasOne('App\Books','id','users_id');
    }
}
