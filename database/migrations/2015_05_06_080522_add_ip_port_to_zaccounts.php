<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIpPortToZaccounts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zresources', function(Blueprint $table)
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
		Schema::table('zresources', function(Blueprint $table)
		{
			$table->dropColumns(['ip', 'port']);
		});
	}

}
