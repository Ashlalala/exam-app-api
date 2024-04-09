<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnsweredQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answered_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('started_exam_id')->constrained('started_exams');
            $table->foreignId('group_id')->nullable()->constrained('q_a_groups');
            $table->foreignId('answered_group_id')->nullable()->constrained('answered_groups');
            $table->foreignId('qa_id')->constrained('q_a_s');
            $table->string('type')->default('full');
            $table->longText('ans');
            $table->boolean('correct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answered_questions');
    }
}
