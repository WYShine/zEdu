<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zcourse extends Model {

    const STATE_PENDING = 'pending',
        STATE_CLOSED = 'closed',
        STATE_USING = 'using',
        STATE_DISAPPROVED = 'disapproved';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zcourses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'application_note', 'zpattern_id', 'state'];

    /**
     * Many to one relationship: user
     *
     * The applicant of this course. It must be a user with teacher/admin role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function applicant()  {
        return $this->belongsTo('App\User');
    }


    /**
     * Many to one relationship: user
     *
     * The approver of this course. It must be a user with admin role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function approver() {
        return $this->belongsTo('App\User');
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

    /**
     * Many to one relationship
     *
     * The pattern of this course
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    protected function zpattern() {
        return $this->belongsTo('App\Zpattern');
    }
}