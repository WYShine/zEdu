<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddZresourceIdToZcoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zcourses', function(Blueprint $table)
		{
			$table->integer('zresource_id')->unsigned();
            $table->foreign('zresource_id')
                ->references('id')
                ->on('zresources');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('zcourses', function(Blueprint $table)
		{
			$table->dropForeign('zcourses_zresource_id_foreign');
            $table->dropColumn('zresource_id');
		});
	}

}
