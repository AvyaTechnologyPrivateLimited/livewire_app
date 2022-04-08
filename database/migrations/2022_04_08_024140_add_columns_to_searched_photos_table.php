<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('searched_photos', function (Blueprint $table) {
            $table->text('assets')->nullable();
            $table->string('aspect')->nullable();
            $table->string('contributor')->nullable();
            $table->integer('has_model_release')->nullable();
            $table->string('media_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('searched_photos', function (Blueprint $table) {
            //
        });
    }
};
