<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("guests", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("nation_code");
            $table->string("phone");
            $table->text("description")->nullable();
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
        Schema::dropIfExists("guests");
    }
}
