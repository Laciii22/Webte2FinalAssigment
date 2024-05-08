<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('archived_questions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->string('lesson');
            $table->unsignedBigInteger('user_id');
            $table->enum('category', ['text', 'choice']);
            $table->integer('version');
            $table->timestamp('closed_at');
            $table->timestamps(); // This adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_questions');
    }
};
