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
        Schema::create('authorizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id') // UNSIGNED BIG INT
            ->references('id')
            ->on('clients'); 
            $table->foreignId('user_id') // UNSIGNED BIG INT
            ->references('id')
            ->on('users');
            $table->boolean('proceeded');
            $table->date('proceeded_date');
            $table->binary('signature_client')->nullable();
            $table->date('signature_date');
            $table->string('skin_type');

            $table->string('color_eyebrows')->nullable();
            $table->string('color_eyerline')->nullable();
            $table->string('color_lips')->nullable();
            $table->string('color_touchup')->nullable();
            $table->string('color_other')->nullable();
            $table->text('color_observation')->nullable();
            $table->json('history');
            $table->json('history_specify')->nullable();
            $table->json('reason');
            $table->string('cost_treatment');
            $table->boolean('image_release')->default(false);
            $table->boolean('delete')->default(false);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorizations');
    }
};
