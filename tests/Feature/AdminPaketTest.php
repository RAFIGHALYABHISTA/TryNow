<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Paket;

class AdminPaketTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_paket()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.pakets.store'), [
            'nama_paket' => 'Paket X',
            'deskripsi' => 'Deskripsi paket X',
            'harga' => 150000,
        ]);

        $response->assertRedirect(route('admin.pakets.index'));
        $this->assertDatabaseHas('pakets', ['nama_paket' => 'Paket X']);
    }

    public function test_non_admin_cannot_access_admin_routes()
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get(route('admin.pakets.index'));
        $response->assertStatus(302); // redirect to login or forbidden
    }

    public function test_admin_sees_newly_registered_users()
    {
        // Register a new user via public registration
        $this->post('/register', [
            'name' => 'New Student',
            'email' => 'newstudent@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Create admin and view user list
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get(route('admin.users.index'));
        $response->assertStatus(200);
        $response->assertSee('newstudent@example.com');
        $response->assertSee('New Student');
    }

    public function test_admin_dashboard_data_endpoint_returns_json()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        // create some users and a transaction
        User::factory()->count(3)->create(['role' => 'user']);
        $paket = Paket::create(['nama_paket' => 'LivePkt', 'deskripsi' => 'desc', 'harga' => 0]);
        $user = User::factory()->create(['role' => 'user']);
        \App\Models\Transaksi::create(['user_id' => $user->id, 'paket_id' => $paket->id, 'jumlah' => 0, 'status' => 'success']);

        $response = $this->actingAs($admin)->get(route('admin.dashboard.data'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['totalUsers', 'totalPakets', 'totalSoals', 'totalTransactions', 'recentUsers', 'recentTransactions']);
    }
}
