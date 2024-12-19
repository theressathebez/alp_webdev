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
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->constrained(
                table: 'stages',
                indexName: 'stage_output_id_foreign'
            );

            $table->foreignId('registration_id')->constrained(
                table: 'registrations',
                indexName: 'registration_output_id_foreign'
            );

            $table->foreignId('result_id')->constrained(
                table: 'results',
                indexName: 'results_output_id_foreign'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};
