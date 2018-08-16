<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_logs', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->integer('user_id')->nullable()->default(0)->comment('用户id（为0表示系统级操作，其它一般为管理型用户操作）');
            $table->string('type')->nullable()->default('system')->comment('操作类型');
            $table->string('url', 200)->nullable()->default('-')->comment('操作发起的url');
            $table->string('content')->nullable()->comment('操作内容');
            $table->string('operator_ip', 50)->nullable()->comment('操作者ip');
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
        Schema::dropIfExists('system_logs');
    }
}
