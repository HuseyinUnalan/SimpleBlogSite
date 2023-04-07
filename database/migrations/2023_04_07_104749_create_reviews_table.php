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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->text('comment');
            

            // Blog Silindiği Zaman Yorumunda Silinmesi İçin
            $table->foreign('blog_id')
                ->references('id')->on('blogs')
                ->onDelete('cascade');

            // Kullanıcı Silindiği Zaman Yorumunda Silinmesi İçin
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('status')->default(1);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
