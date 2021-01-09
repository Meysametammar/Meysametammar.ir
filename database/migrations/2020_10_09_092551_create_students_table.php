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
        Schema::create("students", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table
                ->foreignUuid("user_id")
                ->references("id")
                ->on("users")
                ->nullable();
            $table->string("name");
            $table->string("nation_code");
            $table->date("birth_date");
            $table->string("school_grade");
            $table->string("school_name");
            $table->string("last_school_average");
            $table->string("father_phone")->nullable();
            $table->string("father_job")->nullable();
            $table->string("mother_phone")->nullable();
            $table->string("mother_job")->nullable();
            $table->string("home_phone")->nullable();
            $table->string("home_address")->nullable();
            $table->text("picture")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("students");
    }
}
