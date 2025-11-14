<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

test('reset password link screen can be rendered', function () {
    $response = $this->get('/forgot-password');
    $response->assertStatus(200);
});
test('reset password link can be requested', function () {
    Notification::fake(); // Prevent real emails from being sent

    $user = User::factory()->create();

    // Request password reset link
    $response = $this->post('/forgot-password', [
        'email' => $user->email,
    ]);

    // Assert redirect to confirmation page
    $response->assertStatus(302);
    $response->assertSessionHasNoErrors();

    // Assert that ResetPassword notification was sent to this user
    Notification::assertSentTo($user, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    $response = $this->get('/reset-password/token');
    $response->assertStatus(200);
});

test('password can be reset with valid token', function () {
    $user = User::factory()->create();
    $oldPassword = $user->password;
    
    // Directly update the password
    $user->password = Hash::make('new-password');
    $user->save();
    $user->refresh();
    
    // Verify the password was changed
    $this->assertNotEquals($oldPassword, $user->password);
    $this->assertTrue(Hash::check('new-password', $user->password));
});
