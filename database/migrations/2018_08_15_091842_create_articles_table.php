<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->string('title', 100)->nullable()->index('title')->comment('标题');
            $table->string('flag', 50)->nullable()->default('')->index('flag')->comment('推荐位');
            $table->string('thumb', 200)->nullable();
            $table->string('slug', 200)->nullable()->unique('content_slug_unique')->comment('网址缩略名，文章、单页与碎片模型有缩略名');
            $table->integer('cid')->unsigned()->nullable()->default(0)->comment('分类id：文章分类id不为0，单页与碎片分类id默认为0');
            $table->string('description')->nullable()->comment('内容摘要');
            $table->text('content', 65535)->comment('文章正文');
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
        Schema::dropIfExists('articles');
    }
}
