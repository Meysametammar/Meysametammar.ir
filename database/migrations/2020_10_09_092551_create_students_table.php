<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table
                ->integer('user_id')
                ->nullable()
                ->unsigned();
            $table->string('name');
            $table->string('birth_cert_id');
            $table->string('birth_day');
            $table->string('birth_month');
            $table->string('birth_year');
            $table->string('school_grade');
            $table->string('school_name');
            $table->string('last_school_average');
            $table->string('father_phone')->nullable();
            $table->string('father_job')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('home_address')->nullable();
            $table->text('picture')->nullable();
            $table->integer('updated_at');
            $table->integer('created_at');
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
