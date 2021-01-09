<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesOwnership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("properties_ownership", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table
                ->foreignUuid("property_id")
                ->references("id")
                ->on("properties");
            $table->uuid("owner_id");
            $table->string("owner_type", 50);
            $table->text("description")->nullable();
            $table->dateTime("alarm_at")->nullable();
            $table->text("alarm_description")->nullable();
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
        Schema::dropIfExists("properties_ownership");
    }
}
