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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('body')->nullable();
            $table->text('descrip')->nullable();
            $table->string('tag')->nullable();
            $table->text('thumnail')->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('author')->nullable();
            $table->integer('status')->default(1)->comment('1=active,2=in-active');
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
        Schema::dropIfExists('posts');
    }
};
