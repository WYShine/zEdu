<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zpattern extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zpatterns';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['capacity', 'description'];


    /**
     * One to many relationship
     *
     * Courses that use this pattern
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function zcourses() {
        return $this->hasMany('App\Zcourse');
    }

    protected function zresources() {
        return $this->hasMany('App\Zresource');
    }

    protected function zresources_available() {
        return $this->hasMany('App\Zresource')
            ->where('state', '=', 'available');
    }
}