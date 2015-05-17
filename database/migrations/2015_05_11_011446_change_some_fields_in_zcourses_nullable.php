<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeFieldsInZcoursesNullable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement('ALTER TABLE `zcourses` MODIFY `zresource_id` INTEGER UNSIGNED NULL');
        DB::statement('ALTER TABLE `zcourses` MODIFY `approver_id` INTEGER UNSIGNED NULL');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statement('ALTER TABLE `zcourses` MODIFY `zresource_id` INTEGER UNSIGNED');
        DB::statement('ALTER TABLE `zcourses` MODIFY `approver_id` INTEGER UNSIGNED');
	}

}
