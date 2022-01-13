<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string('titre')->nullable();
            $table->text('contenu')->nullable();
            $table->string('categorie')->nullable();
            $table->string('date')->nullable();
            $table->string('lieu')->nullable();
            $table->string('media_type')->nullable();
            $table->string('media')->nullable();
            $table->string('media_url')->nullable();
            $table->string('created_by')->nullable();
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
}
