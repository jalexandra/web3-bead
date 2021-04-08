<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectQuestionOwner extends Migration
{
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table){
            $table->uuid('owner_id')->after('score');
        });
    }

    public function down(): void
    {
        Schema::dropColumns('questions', ['owner_id']);
    }
}
