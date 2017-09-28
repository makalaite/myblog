<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMyPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('my_posts', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_my_posts_my_users')->references('id')->on('my_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('my_posts', function(Blueprint $table)
		{
			$table->dropForeign('fk_my_posts_my_users');
		});
	}

}
