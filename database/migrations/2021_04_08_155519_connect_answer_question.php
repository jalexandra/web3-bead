<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectAnswerQuestion extends Migration
{
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table){
            $table->uuid('answer_id')->after('owner_id')->nullable();
        });
    }

    public function down(): void
    {
        //
    }
}
