<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PenanggungJawabController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\TokoDistributorController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\CheckController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('lokasi', LokasiController::class);
Route::apiResource('merk', MerkController::class);
Route::apiResource('penja', PenanggungJawabController::class);
Route::apiResource('produsen', ProdusenController::class);
Route::apiResource('tipe', TipeController::class);
Route::apiResource('todis', TokoDistributorController::class);
Route::apiResource('aset', AsetController::class);
Route::apiResource('check', CheckController::class);
