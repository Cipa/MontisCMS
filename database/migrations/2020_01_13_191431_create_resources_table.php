<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description')->default('');
            $table->string('menu_title')->default('');
            $table->string('alias');
            $table->longText('content')->default('');
            $table->unsignedBigInteger('template_id')->default(0);
            $table->unsignedTinyInteger('type_id')->default(1);
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();

            $table->softDeletes();

            $table->index(['alias', 'parent_id']);
            $table->unique(['alias', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
