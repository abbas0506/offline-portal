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
        //
        Schema::create('thesis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paper_id')->constrained()->onDelete('cascade');
            $table->string('degree_type');      // e.g. MSc, PhD
            $table->string('degree_program');   // e.g. Computer Science
            $table->text('key_findings')->nullable();
            $table->text('methodology')->nullable();
            $table->date('submission_date');
            $table->string('supervisor')->nullable();
            $table->string('doi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('thesis');
    }
};
