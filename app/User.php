<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password',
        'gender', 'phone', 'organization', 'department',
        'position', 'role', 'confirmation_code'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    /**
     * One to one relationship: zaccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function zaccount() {
        return $this->hasOne('App\Zaccount');
    }

    /**
     * One to many relationship: applied_courses
     *
     * A user with teacher/admin role may apply courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function applied_courses() {
        return $this->hasMany('App\Zcourse', 'applicant_id');
    }

    /**
     * One to many relationship: approved_courses
     *
     * A user with admin role may approve courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function approved_courses() {
        return $this->hasMany('App\Zcourse', 'approver_id');
    }

    /**
     * Confirm user's registration
     */
    public function confirm() {
        $this->confirmed = true;
        $this->confirmation_code = null;
        $this->save();
    }
}
