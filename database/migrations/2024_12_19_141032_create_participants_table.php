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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('participant_name');
            $table->date('participant_dob');
            $table->string('participant_location');
            $table->string('participant_email');
            $table->string('participant_phone');

            $table->foreignId('team_id')->constrained(
                table: 'teams',
                indexName: 'participant_team_id_foreign'
            );

            $table->foreignId('leader_id')->constrained(
                table: 'leaders',
                indexName: 'participant_leader_id_foreign'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
