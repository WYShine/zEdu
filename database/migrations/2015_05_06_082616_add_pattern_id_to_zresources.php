<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatternIdToZresources extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('zresources', function(Blueprint $table)
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
		Schema::table('zresources', function(Blueprint $table)
		{
			$table->dropForeign('zresources_zpattern_id_foreign');
            $table->dropColumn('zpattern_id');
		});
	}

}
