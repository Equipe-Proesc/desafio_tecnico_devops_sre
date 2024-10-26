<?php

namespace App\Http\Controllers;

use App\Services\ReportCardService;

class StudentReportCardController extends Controller
{
    public function __construct(private readonly ReportCardService $service)
    {
    }

    public function __invoke($id)
    {
        $studentData = $this->service->cardByStudent($id);
        $grades = $studentData->getStudentGradesCalculated();
        $class = $studentData->getClass();
        $student = $studentData->getStudent();
        return view('report-school-card', [
            'class' => $class,
            'student' => $student,
            'grades' => $grades
        ]);
    }
}