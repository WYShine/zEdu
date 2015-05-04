<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zaccount extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zaccounts';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    /**
     * One to one relationship: user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function user() {
        return $this->hasOne('App\User');
    }

}