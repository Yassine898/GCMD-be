<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PayementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[UserController::class,'signin']);
Route::delete('/member/delete/{id}',[MemberController::class,'delete']);
Route::get('/member/{id}',[MemberController::class,'detail']);
Route::put('/wallet/update-balance/member/{id}',[WalletController::class,'updateBalance']);
Route::get('/members',[MemberController::class,'index']);
Route::post('/members/store',[MemberController::class,'store']);
Route::post('/payments',[PayementController::class,'store']);
Route::post('/members/bulk-delete',[MemberController::class,'bulkDelete']);
