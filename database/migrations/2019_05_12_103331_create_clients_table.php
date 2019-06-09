<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->date('birth_of_date');
			$table->integer('blood_type_id')->unsigned();
			$table->string('phone');
			$table->string('password');
			$table->integer('city_id')->unsigned();
			$table->date('last_donation_date');
			$table->string('pin_code')->nullable();
            $table->string('api_token', 60)->nullable();
            $table->integer('governorate_id')->unsigned();
            $table->tinyInteger('active')->nullable();

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
