<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectAnswerOwner extends Migration
{
    public function up(): void
    {
        Schema::table('answers', function (Blueprint $table){
            $table->uuid('owner_id')->after('score');
        });
    }

    public function down(): void
    {
        Schema::dropColumns('answers', ['owner_id']);
    }
}
