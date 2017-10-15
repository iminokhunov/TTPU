<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->date('date');
            $table->tinyInteger('slot_id')->unsigned();
            $table->string('group_id',191);
            $table->string('course_id',191);
            $table->string('room_id',191);
            $table->string('teacher_id',191);
            $table->string('time_id',191)->unique();
            $table->primary(['date','slot_id','group_id']);
        });

        Schema::table('timeslots', function(Blueprint $table)
        {

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('slot_id')
                ->references('id')->on('slots')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeslots');
    }
}
