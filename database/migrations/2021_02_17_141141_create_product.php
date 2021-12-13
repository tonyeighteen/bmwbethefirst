<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->string("brand");
            $table->string("short_model");
            $table->string("long_model");
            $table->string("price");
            $table->string("slogan");
            $table->string("youtube");
            $table->string("images");
            $table->string("thumbnail");
            $table->text("feature");
            $table->text("design");
            $table->text("operate");
            $table->text("technology");
            $table->dateTime("created_at")->nullable();
            $table->dateTime("updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
