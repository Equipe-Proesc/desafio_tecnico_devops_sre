<?php

namespace App\Strategies;

use App\Contracts\GradeCalculatorStrategyInterface;
use Illuminate\Support\Collection;

class GradeCalculatorMax3Disciplines implements GradeCalculatorStrategyInterface
{
    public static function calculate(Collection|array $grades):array
    {   
        if($grades instanceof Collection){
            $grades = $grades->toArray();
        }

        $gradeCalculated = [];
        foreach($grades as $subject=>$grades){
            $rawGradeOrder1 = 0;
            $rawGradeOrder2 = 0;
            $rawGradeOrder3 = 0;
            $rawGradeOrder4 = 0;

            foreach($grades as $grade){
                if($grade['order']  == 1){
                    $rawGradeOrder1 += $grade['grade'];
                } elseif($grade['order']  == 2){
                    $rawGradeOrder2 += $grade['grade'];
                }elseif($grade['order']  == 3){
                    $rawGradeOrder3 += $grade['grade'];
                }elseif($grade['order']  == 4){
                $rawGradeOrder4 += $grade['grade'];
                }
            }
            $gradeCalculated[$subject] = [
                    [
                        'order' => 1,
                        'term' => "Primeiro Bimestre",
                        "gradeCalculated" => $rawGradeOrder1/3,
                    ],
                    [
                        'order' => 2,
                        'term' => "Segundo Bimestre",
                        "gradeCalculated" => $rawGradeOrder2/3,
                    ],
                    [
                        'order' => 3,
                        'term' => "Terceiro Bimestre",
                        "gradeCalculated" => $rawGradeOrder3/3,
                    ],
                    [
                        'order' => 4,
                        'term' => "Quarto Bimestre",
                        "gradeCalculated" => $rawGradeOrder4/3,
                    ],
                ];
        }

        return $gradeCalculated;
    }
}
