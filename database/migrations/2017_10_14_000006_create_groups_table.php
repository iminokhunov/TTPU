<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',191)->primary();
            $table->string('faculty_id',191); //Student table da gr_id ga teng
            $table->string('teacher_id',191);
            $table->timestamps();
        });

        Schema::table('groups', function(Blueprint $table)
        {
            $table->foreign('faculty_id')
                ->references('id')->on('faculties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
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
        Schema::dropIfExists('groups');
    }
}
