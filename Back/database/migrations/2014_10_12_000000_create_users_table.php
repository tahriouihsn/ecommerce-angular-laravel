<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');


            $table->unsignedBigInteger('cooperative_id')->nullable();
            $table->foreign("cooperative_id")->references('id')->on('cooperatives')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign("role_id")->references('id')->on('roles');


            $table->boolean("is_email_verified")->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->boolean('is_activated')->default(false);


            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
}
