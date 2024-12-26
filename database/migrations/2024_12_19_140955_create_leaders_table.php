<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('leader_name');
            $table->string('leader_email');
            $table->string('leader_phone');
            $table->date('leader_dob');
            $table->string('leader_location');


            $table->foreignId('team_id')->constrained(
                table: 'teams',
                indexName: 'team_leaders_id_foreign'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaders');
    }
};
