<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZresourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zresources', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('pattern');
            $table->string('password_teacher');
            $table->string('password_student');
            $table->string('state')
                ->default('pending');
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
		Schema::drop('zresources');
	}

}
