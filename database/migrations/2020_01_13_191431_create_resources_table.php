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
            $table->unsignedBigInteger('template')->default(0);
            $table->unsignedTinyInteger('type')->default(1);
            $table->unsignedBigInteger('parent')->default(0);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();

            $table->softDeletes();

            $table->index(['alias', 'parent']);
            $table->index('type');
            $table->index('template');
            $table->unique(['alias', 'parent']);

            //$table->foreign('type_id')->references('id')->on('types');
            //SQL: alter table `resources` add constraint `resources_type_id_foreign` foreign key (`type_id`) references `types` (`id`))
            // $table->foreign('template_id')->references('id')->on('template');
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
