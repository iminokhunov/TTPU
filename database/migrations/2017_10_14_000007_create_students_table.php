<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',191)->primary();
            $table->string('password');
            $table->rememberToken();
            $table->string('name');
            $table->string('surname');
            $table->date('birthday');
            $table->string('group_id',191);
            $table->string('phone');
            $table->string('email',191)->unique();
            $table->string('address');
            $table->timestamps();
        });

        Schema::table('students', function(Blueprint $table)
        {
            $table->foreign('group_id')
                ->references('id')->on('groups')
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
        Schema::dropIfExists('students');
    }
}
