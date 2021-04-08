<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectAnswerUser extends Migration
{
    public function up(): void
    {
        Schema::create('answer_user', function (Blueprint $table){
            $table->uuid('answer_id');
            $table->uuid('user_id');
            $table->boolean('positive')->comment('positive: score +1');

            $table->primary(['answer_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answer_user');
    }
}
