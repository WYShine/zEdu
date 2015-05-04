<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->boolean('confirmed')->default(false);
            $table->string('confirmation_code')->nullable();
            $table->string('gender')->default('male');
            $table->string('phone');
            $table->string('organization')->default('');
            $table->string('department')->default('');
            $table->string('position')->default('');
            // TODO: Region
            $table->string('role')->default('user');
            $table->boolean('applied_account')->default(false);
            $table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
