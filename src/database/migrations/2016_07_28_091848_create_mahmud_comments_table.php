<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahmudCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahmud_comments', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('thread_id');
            $table->bigInteger('parent_id');
            $table->text('content');
            $table->boolean('is_approved');
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
        Schema::dropIfExists('mahmud_comments');
    }
}
