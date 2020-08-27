<?php


namespace App;


class Order
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';
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
    protected $fillable = ['id','date'];

//    public function type()
//    {
////        return $this->belongsTo('App\Type');
//        return $this->hasOne('App\Type','id','type_id');
//    }

}
