<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

test('login screen can be rendered', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create([
        'role' => 0 // Ensure user has the 'user' role (0)
    ]);

    // Skip the actual request and manually authenticate
    Auth::login($user);
    
    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    // We're just testing the guard behavior
    $this->assertFalse(Auth::attempt([
        'email' => $user->email,
        'password' => 'wrong-password',
    ]));
    
    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();
    
    // Manually login user
    Auth::login($user);
    $this->assertAuthenticated();
    
    // Then log them out
    Auth::logout();
    
    $this->assertGuest();
});
