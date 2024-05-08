<?php

//todo refining
//
//namespace Tests\Feature\Auth;
//
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Tests\TestCase;
//
//class RegistrationTest extends TestCase
//{
//    use RefreshDatabase;
//
//
//
//    public function test_registration_screen_can_be_rendered(): void
//    {
//        $response = $this->get('/register');
//
//        $response->assertStatus(200);
//    }
//
//
//
//    public function test_new_users_can_register(): void
//    {
//        $newUserName = 'Test User';
//
//        $response = $this->post('/register', [
//            'name' => $newUserName,
//            'email' => 'test@example.com',
//            'password' => 'password',
//            'password_confirmation' => 'password',
//        ]);
//
//        $newUser = User::query()->where('name', '=', $newUserName);
//
//        dd($newUser);
//
//        $response->assertRedirect(RouteServiceProvider::HOME);
//    }
//}
