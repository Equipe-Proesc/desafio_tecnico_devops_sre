<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface GradeCalculatorStrategyInterface
{
    public static function calculate(Collection|array $grades):array;
}