<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pages
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('photo')->default('page-image-default.jpg');
            $table->longText('body')->nullable();
            $table->string('publish');
            $table->integer('counter')->default(0);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('is_homepage')->default(0);

            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
            
            $table->timestamps();
        });

        // Page Custom Field
        Schema::create('page_custom_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique();
            $table->string('display_name');
            $table->longText('value')->nullable();
            $table->string('type');
            $table->integer('order')->default(1);

            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')
            ->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('page_custom_fields');
        Schema::dropIfExists('pages');
    }
}
