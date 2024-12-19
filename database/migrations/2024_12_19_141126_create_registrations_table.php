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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->timestamp('registration_date');

            $table->foreignId('team_id')->constrained(
                table: 'teams',
                indexName: 'registration_team_id_foreign'
            );

            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'category_registration_id_foreign'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
