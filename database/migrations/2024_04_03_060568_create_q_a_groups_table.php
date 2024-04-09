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
        Schema::create('q_a_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams');
            $table->string('ans_fake');
            $table->foreignId('qa_1')->constrained('q_a_s');
            $table->foreignId('qa_2')->constrained('q_a_s');
            $table->foreignId('qa_3')->nullable()->constrained('q_a_s');
            $table->foreignId('qa_4')->nullable()->constrained('q_a_s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('q_a_groups');
    }
};
