<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("files", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table
                ->foreignUuid("user_id")
                ->references("id")
                ->on("users");
            $table->text("path");
            $table->string("mime");
            $table->string("type");
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
        Schema::dropIfExists("files");
    }
}
