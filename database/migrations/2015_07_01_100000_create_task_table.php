<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
         public function up()
         {

	    /**
	     * Table: pages
	     */
	       Schema::create('tasks', function($table) {
                $table->increments('id')->unsigned();
                $table->string('task', 50)->nullable();
                $table->string('upload_folder', 100)->nullable();
                $table->softDeletes();
                $table->nullableTimestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
         public function down()
         {
	            Schema::drop('tasks');
         }

}