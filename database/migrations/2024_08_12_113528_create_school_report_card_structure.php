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
        // Criação da tabela de turmas
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Configurações das turmas
        Schema::create('classes_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('minimal_disciplines_to_advance_to_next_class');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->timestamps();
        });

        // Criação da tabela de estudantes
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->timestamps();
        });

        // Criação da tabela de matérias
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Criação da tabela de professores
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->timestamps();
        });

        // Criação da tabela de bimestres (terms)
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Criação da tabela de notas (grades)
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('term_id')->constrained('terms')->onDelete('cascade');
            $table->decimal('grade'); // Nota com até 2 casas decimais
            $table->integer('order'); // Ordem das avaliações postadas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
        Schema::dropIfExists('terms');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('students');
        Schema::dropIfExists('classes_settings');
        Schema::dropIfExists('classes');
    }
};
