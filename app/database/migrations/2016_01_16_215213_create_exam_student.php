<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamStudent extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_student', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('exam_id')->unsigned()->index();
			$table->integer('student_id')->unsigned()->index();
			$table->string('start');
			$table->string('end');
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
		Schema::drop('exam_student');
	}

}
