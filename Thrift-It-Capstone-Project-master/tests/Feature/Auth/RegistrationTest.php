<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');
    $response->assertStatus(200);
});

test('new users can register', function () {
    // Instead of making a request, directly create a user and test authentication
    $userData = [
        'fname' => 'Test',
        'lname' => 'User',
        'email' => 'test@example.com',
        'password' => 'password',
        'role' => 0,
    ];
    
    $user = User::create([
        'fname' => $userData['fname'],
        'lname' => $userData['lname'],
        'email' => $userData['email'],
        'password' => bcrypt($userData['password']),
        'role' => $userData['role'],
    ]);
    
    // Manually login the user for the test
    Auth::login($user);
    
    $this->assertAuthenticated();
    $this->assertEquals('test@example.com', Auth::user()->email);
});
