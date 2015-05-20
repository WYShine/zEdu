<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCapacityToZpatterns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zpatterns', function(Blueprint $table)
		{
			$table->string("capacity")->default('small');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('zpatterns', function(Blueprint $table)
		{
			$table->dropColumn("capacity");
		});
	}

}
