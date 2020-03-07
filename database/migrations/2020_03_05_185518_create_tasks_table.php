<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('show_id')->nullable();
            $table->string('subject',191)->unique();
            $table->text('description')->nullable();
            $table->string('affected_regions',191);
            $table->string('status',50);
            $table->string('priority',50);
            $table->date('due_date');
            $table->string('assignee',50);
            $table->string('reviewer',50);
            $table->string('target_version',50);
            $table->text('reviewer_comments')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
