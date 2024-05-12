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
        Schema::table('responses', function (Blueprint $table) {
            $table->integer('version')->default(1);  // Adding a version column with a default value
        });
    }

    public function down()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropColumn('version');  // This will remove the version column if the migration is rolled back
        });
    }
};
