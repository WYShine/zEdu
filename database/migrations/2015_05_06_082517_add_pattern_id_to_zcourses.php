<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatternIdToZcourses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zcourses', function(Blueprint $table)
		{
            $table->dropColumn('pattern');
			$table->integer('zpattern_id')
                ->unsigned();
            $table->foreign('zpattern_id')
                ->references('id')
                ->on('zpatterns');
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
			$table->dropForeign('zcourses_zpattern_id_foreign');
            $table->dropColumn('zpattern_id');
		});
	}

}
