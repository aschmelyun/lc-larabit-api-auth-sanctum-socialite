<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('twitter')->redirect();
});

Route::get('/auth/callback', function () {
    $twitterUser = Socialite::driver('twitter')->user();

    $user = User::where('email', $twitterUser->email)->first();
    if (!$user) {
        $user = User::create([
            'email' => $twitterUser->email,
            'name' => $twitterUser->name,
            'password' => Hash::make(Str::random(16))
        ]);
    }

    $token = $user->createToken('twitter')->plainTextToken;
    return redirect()->route('home', ['token' => $token]);
});

Route::get('/me', function () {
    return Auth::user();
})->middleware('auth:sanctum');
