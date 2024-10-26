<?php

use App\Http\Controllers\StudentReportCardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('boletim/{id}', StudentReportCardController::class);

Route::get('/health-check', function () {
    try {
        DB::connection()->getPdo();

        if (!DB::connection()->getDatabaseName()) {
            return response()->json(['success' => false, 'message' => 'There was an error connecting!', 'error' => 'no connection with database']);
        }

        return response()->json(['success' => true, 'message' => 'success']);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => 'There was an error connecting!', 'error' => $e->getMessage()]);
    }
});
