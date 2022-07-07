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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('fullname', 200);
            $table->string('ci', 20)->nullable();
            $table->string('occupation', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('citycode', 300)->nullable();
            $table->string('phone')->nullable();
            $table->string('knowabout')->nullable();
            $table->date('dob')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
