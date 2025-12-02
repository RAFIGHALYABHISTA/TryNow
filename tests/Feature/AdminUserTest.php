<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_delete_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $user));
        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_cannot_delete_self()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $admin));

        $response->assertRedirect(route('admin.users.index'));
        $response->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $admin->id]);
    }

    public function test_non_admin_cannot_delete_user()
    {
        $userA = User::factory()->create(['role' => 'user']);
        $userB = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($userA)->delete(route('admin.users.destroy', $userB));

        // non-admin should be redirected to login/forbidden because route protected
        $this->assertTrue($response->isRedirect());
        $this->assertDatabaseHas('users', ['id' => $userB->id]);
    }
}
