<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIpPortToZresources extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zaccounts', function(Blueprint $table)
		{
			$table->string('ip');
            $table->string('port');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('zaccounts', function(Blueprint $table)
		{
			$table->dropColumn(['ip', 'port']);
		});
	}

}
