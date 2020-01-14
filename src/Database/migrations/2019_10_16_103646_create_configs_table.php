<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('website_configs', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('name', 200);
			$table->string('display_name', 100);
			$table->string('type', 100);
			$table->text('value');
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
		Schema::drop('website_configs');
	}

}
