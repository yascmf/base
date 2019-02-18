<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type', 4)->comment('标签分类属性：1平台，2时长，3风格，4题材，5受众人群，6热门标签');
            $table->string('name', 50)->comment('标签名称');
            $table->string('description', 255)->comment('标签描述');
            $table->bigInteger('ref_count')->default(0)->unsigned()->comment('被引用次数');
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
