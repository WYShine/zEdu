<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zaccount extends Model {

    /**
     * One to one relationship: user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function user() {
        return $this->hasOne('App\User');
    }

}