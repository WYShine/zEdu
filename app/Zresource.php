<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Zresource extends Model{
    protected function zcourse() {
        return $this->hasOne('App\Zcourse');
    }
}