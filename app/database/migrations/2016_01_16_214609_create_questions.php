<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('statement');
			$table->string('correct');
			$table->string('op1');
			$table->string('op2');
			$table->string('op3')->nullable();
			$table->string('op4')->nullable();
			$table->string('op5')->nullable();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('category_id')->unsigned()->index();
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
		Schema::drop('questions');
	}

}
