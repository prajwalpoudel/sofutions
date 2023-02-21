<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::resource('company', CompanyController::class)->except(['show']);
Route::resource('employee', EmployeeController::class)->except(['show']);
