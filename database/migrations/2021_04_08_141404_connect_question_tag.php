<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectQuestionTag extends Migration
{
    public function up(): void
    {
        Schema::create('question_tag', function (Blueprint $table){
           $table->uuid('question_id');
           $table->bigInteger('tag_id');

           $table->primary(['question_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        //
    }
}
