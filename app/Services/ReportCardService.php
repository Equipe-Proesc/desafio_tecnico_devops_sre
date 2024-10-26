<?php

namespace App\Services;

use App\Strategies\GradeCalculatorMax3Disciplines;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReportCardService 
{
    protected stdClass|array $student;
    protected Collection|array $grades;
    protected stdClass|array $class;

    /**
     * Retorna os dados do boletim por aluno
     * @param int $id
     * 
     * @return static
     */
    public function cardByStudent(int $id) : static
    {
        $this->student = DB::table('students')
        ->where('id', $id)->first();
        $this->class = DB::table('classes')
        ->join('classes_settings','classes.id', '=', 'classes_settings.class_id')
        ->where('classes.id', $this->student->class_id)
        ->first();

        $this->grades = DB::table('grades')
        ->join('subjects','grades.subject_id', '=', 'subjects.id')
        ->join('terms', 'grades.term_id','=','terms.id')
        ->where('student_id', $this->student->id)->get(['subjects.name as subject', 'grades.grade', 'terms.name as term'])->reduce(
            function($carry,$item){
                $item->order = match($item->term){
                   "Primeiro Bimestre" => 1,
                   "Segundo Bimestre" => 2,
                   "Terceiro Bimestre" => 3,
                   "Quarto Bimestre" => 4
                };

                $carry[$item->subject][] = ['grade' => $item->grade, 'term' => $item->term, 'order'=>$item->order ];
                return $carry;
        });
        return $this;
    }

    public function getStudentRawGrades()
    {
        return $this->grades;
    }

    public function getClass()
    {
        return $this->class;
    }
    public function getStudent()
    {
        return $this->student;
    }

    public function getStudentGradesCalculated()
    {
        return match($this->class->minimal_disciplines_to_advance_to_next_class){
                3 => GradeCalculatorMax3Disciplines::calculate($this->grades),
                default => throw new HttpException(422, "Turma não configurada!")
        };
    }
}
