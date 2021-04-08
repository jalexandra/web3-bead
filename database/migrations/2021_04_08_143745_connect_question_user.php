<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectQuestionUser extends Migration
{
    public function up(): void
    {
        Schema::create('question_user', function (Blueprint $table){
            $table->uuid('question_id');
            $table->uuid('user_id');
            $table->boolean('positive')->comment('positive: score +1');

            $table->primary(['question_id', 'user_id']);
        });
    }

    public function down(): void
    {
        //
    }
}
