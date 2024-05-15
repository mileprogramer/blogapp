<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category');
            $table->bigInteger('id_author');
            $table->foreign('id_author')->references('id')->on('users');
            $table->string('title');
            $table->text('body');
            $table->date('date');
            $table->string('slug');
            $table->bigInteger('total_access')->default(0);
            $table->boolean("active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
