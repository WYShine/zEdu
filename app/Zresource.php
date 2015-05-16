<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Zresource extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zresources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    /**
     * One to one relationship: zcourse
     *
     * Course that this package instance belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function zcourse() {
        return $this->hasOne('App\Zcourse');
    }

    protected function zpattern() {
        return $this->belongsTo('App\Zpattern');
    }
}