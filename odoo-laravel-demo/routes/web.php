<?php

use App\Http\Controllers\OdooUserController;
use Illuminate\Support\Facades\Route;

Route::get('/odoo/users', [OdooUserController::class, 'index']);