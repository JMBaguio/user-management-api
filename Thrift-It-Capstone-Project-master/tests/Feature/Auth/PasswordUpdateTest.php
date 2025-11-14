<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('password can be updated', function () {
    // // Skip the actual HTTP test and test password updates directly
    // $this->markTestSkipped('Skipping due to potential database deadlocks');
    
    
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->withSession(['_token' => csrf_token()])
        ->put('/password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
            '_token' => csrf_token(),
        ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect('/');

    $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
    
});

test('correct password must be provided to update password', function () {
    // // Skip the validation test which has issues with the generated passwords
    // $this->markTestSkipped('Skipping validation test due to password validation failures');
    
    
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->withSession(['_token' => csrf_token()])
        ->put('/password', [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
            '_token' => csrf_token(),
        ]);

    $response->assertSessionHasErrorsIn('updatePassword', 'current_password');
    $response->assertRedirect('/');
    
});
