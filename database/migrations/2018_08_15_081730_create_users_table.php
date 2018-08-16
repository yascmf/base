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
            $table->string('username', 20);
            $table->string('email', 120)->unique('users_email_unique');
            $table->string('password', 60);
            $table->string('remember_token', 60)->nullable();
            $table->string('nickname', 20);
            $table->string('phone', 20)->nullable();
            $table->string('realname', 20);
            $table->boolean('is_locked')->default(0)->comment('1锁定,0正常');
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
