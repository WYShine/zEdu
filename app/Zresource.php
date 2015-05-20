<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Zresource extends Model {

    const STATE_PENDING = 'pending',
        STATE_CLOSED = 'closed',
        STATE_USING = 'using',
        STATE_AVAILABLE = 'available';

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
    protected $fillable = ['zpattern_id', 'password_teacher', 'password_student',
        'ip', 'port'];


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