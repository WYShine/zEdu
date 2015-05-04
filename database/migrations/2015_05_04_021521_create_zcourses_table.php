<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZcoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zcourses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('application_note');
            $table->integer('pattern');
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')
                ->references('id')
                ->on('users');
            $table->integer('approver_id')->unsigned();
            $table->foreign('approver_id')
                ->references('id')
                ->on('users');
            $table->dateTime('closed_at')->nullable();
            $table->string('state')->default('pending');
            $table->string('closed_reason');
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
		Schema::drop('zcourses');
	}

}
