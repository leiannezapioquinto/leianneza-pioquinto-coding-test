<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;


class UserAuthenticationTest extends TestCase
{
    //use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Refresh a specific table
        $this->refreshSingleTable('users');
    }

    /**
     * Refresh a specific table by rolling back and migrating again.
     *
     * @param string $table
     * @return void
     */
    protected function refreshSingleTable($table)
    {
        // Rollback the specific table
        Artisan::call('migrate:rollback', [
            '--path' => database_path("migrations"),
            '--step' => 1
        ]);

        // Migrate the specific table
        Artisan::call('migrate', [
            '--path' => database_path("migrations")
        ]);

        // Seed the specific table if necessary
        // Artisan::call('db:seed', ['--class' => 'SpecificTableSeeder']);
    }

    /** @test */
    public function a_user_can_view_the_login_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

  /** @test */
    public function a_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/home');
    }

    /** @test */
    public function a_user_cannot_login_with_incorrect_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /** @test */
    public function a_logged_in_user_cannot_view_the_login_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertRedirect('/home');
    }
}
