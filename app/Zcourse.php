<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zcourse extends Model {

    /**
     * Many to one relationship: user
     *
     * The applicant of this course. It must be a user with teacher/admin role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function applicant()  {
        return $this->hasOne('App\User');
    }


    /**
     * Many to one relationship: user
     *
     * The approver of this course. It must be a user with admin role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function approver() {
        return $this->hasOne('App\User');
    }


    /**
     * One to one relationship
     *
     * The package instance of this course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function zresource() {
        return $this->hasOne('App\Zresource');
    }
}