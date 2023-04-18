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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40)->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('phone')->nullable();
            $table->string('password')->nullable(false);
            $table->tinyInteger('type')->default(1); // 1 => normal user, 2 => seller, 3 => admin!
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
        Schema::dropIfExists('users');
    }
};
