<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          // Criando termos
          $terms = ['Primeiro Bimestre', 'Segundo Bimestre', 'Terceiro Bimestre', 'Quarto Bimestre'];
          foreach ($terms as $term) {
              DB::table('terms')->insert([
                  'name' => $term,
                  'created_at' => now(),
                  'updated_at' => now(),
              ]);
          }
  
          // Criando disciplinas
          $subjects = ['Matemática', 'Português', 'Ciências', 'História', 'Geografia'];
          foreach ($subjects as $subject) {
              DB::table('subjects')->insert([
                  'name' => $subject,
                  'created_at' => now(),
                  'updated_at' => now(),
              ]);
          }
  
          // Criando turmas
          DB::table('classes')->insert([
              'name' => 'Turma A',
              'created_at' => now(),
              'updated_at' => now(),
          ]);
  
          $classId = DB::getPdo()->lastInsertId();
  
          // Criando estudantes
          $students = ['Ana Silva', 'Bruno Santos', 'Carlos Oliveira', 'Daniela Lima', 'Eduardo Costa'];
          foreach ($students as $student) {
              DB::table('students')->insert([
                  'name' => $student,
                  'class_id' => $classId,
                  'created_at' => now(),
                  'updated_at' => now(),
              ]);
  
              $studentId = DB::getPdo()->lastInsertId();
  
              // Inserindo notas para cada estudante em cada disciplina e bimestre
              foreach ($terms as $termIndex => $term) {
                  $termId = DB::table('terms')->where('name', $term)->value('id');
                  foreach ($subjects as $subject) {
                      $subjectId = DB::table('subjects')->where('name', $subject)->value('id');
                      for ($i = 1; $i <= 3; $i++) { // 3 notas por bimestre
                          DB::table('grades')->insert([
                              'student_id' => $studentId,
                              'subject_id' => $subjectId,
                              'term_id' => $termId,
                              'grade' => rand(0, 100) / 10, // Gerando uma nota aleatória entre 5.0 e 10.0
                              'order' => $i,
                              'created_at' => now(),
                              'updated_at' => now(),
                          ]);
                      }
                  }
              }
          }
          DB::table('classes_settings')->insert([
            'minimal_disciplines_to_advance_to_next_class' => 3,
            'class_id' => 1
          ]);
    }
}
