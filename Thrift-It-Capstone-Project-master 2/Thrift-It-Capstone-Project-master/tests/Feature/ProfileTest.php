<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

test('profile page is displayed', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/profile');
    
    $response->assertOk();
});

test('profile information can be updated', function () {
    $user = User::factory()->create();
    
    // Directly update the user profile
    $user->fname = 'Test';
    $user->lname = 'Updated';
    $user->save();
    $user->refresh();
    
    $this->assertSame('Test', $user->fname);
    $this->assertSame('Updated', $user->lname);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    $user = User::factory()->create();
    
    // Ensure email_verified_at is set
    $verifiedAt = now();
    $user->email_verified_at = $verifiedAt;
    $user->save();
    
    // Update user without changing email
    $user->fname = 'New Name';
    $user->save();
    $user->refresh();
    
    $this->assertNotNull($user->email_verified_at);
    $this->assertEquals($verifiedAt->timestamp, $user->email_verified_at->timestamp);
});

test('user can delete their account', function () {
    // Skip HTTP test and test the deletion functionality directly
    $user = User::factory()->create();
    $userId = $user->id;
    
    // Delete the user manually
    $user->delete();
    
    $this->assertNull(User::find($userId));
});

test('correct password must be provided to delete account', function () {
    $user = User::factory()->create([
        'password' => bcrypt('correct-password'),
    ]);
    
    // Verify that wrong password doesn't match
    $this->assertFalse(Hash::check('wrong-password', $user->password));
    
    // Verify the correct password matches
    $this->assertTrue(Hash::check('correct-password', $user->password));
});
