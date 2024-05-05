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
        Schema::create('questions', function (Blueprint $table) {
            $table->string('code', 5)->primary();
            $table->string('title');
            $table->string('lesson');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('category', ['text', 'choice'])->default('text');
            $table->boolean('active')->default(true); // Add the 'active' column with default value true
            $table->timestamp('closed_at')->nullable(); // Add closed_at field

        });

        // Generate a random 5-character code for each existing question
        $questions = \App\Models\Question::all();
        foreach ($questions as $question) {
            $question->code = \Illuminate\Support\Str::random(5);
            $question->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
