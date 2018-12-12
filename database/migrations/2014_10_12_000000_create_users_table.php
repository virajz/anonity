<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('screen_name')->unique();
            $table->string('email')->unique();
            $table->string('link')->unique()->nullable();
            $table->text('description', 300)->nullable();
            $table->string('password');
            $table->boolean('private_account');
            $table->boolean('trusted')->default(1);
            $table->boolean('verified')->default(0);
            $table->string('token')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
