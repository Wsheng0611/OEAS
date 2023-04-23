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
            $table->integer('role_id')->default(1);
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // email verification 
            $table->string('password');
            $table->integer('gender')->nullable();
            $table->datetime('birthdate')->nullable();
            $table->rememberToken(); // remember_me purpose
            $table->timestamps(); // timestamps --> created_at + updated_at
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
