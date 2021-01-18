<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("properties", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("code");
            $table->string("title");
            $table->text("description")->nullable();
            $table->text("picture")->nullable();
            $table->integer("number")->default(1);
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
        Schema::dropIfExists("properties");
    }
}
