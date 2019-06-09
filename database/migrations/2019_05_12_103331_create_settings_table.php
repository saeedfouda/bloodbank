<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('phone');
			$table->string('email');
			$table->string('facebook_url');
			$table->string('twitter_url');
			$table->string('youtube_url');
			$table->string('whatsapp_url');
			$table->string('google_url');
			$table->text('about_app');
            $table->string('icon')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
