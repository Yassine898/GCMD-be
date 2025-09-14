<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


Route::get('/sanctum/csrf-cookie', function (Request $request) {
    return response()->json()->withCookie(
        new Cookie(
            'XSRF-TOKEN',
            $request->session()->token(),
            120, // minutes
            '/',
            null,
            config('session.secure_cookie', false), // secure = true if using https
            false, // ❌ HttpOnly = false → frontend can read it
            false,
            config('session.same_site', 'lax')
        )
    );
});
