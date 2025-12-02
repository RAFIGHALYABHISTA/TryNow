<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Soal;

class UserTryoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_buy_paket_and_submit_tryout()
    {
        $user = User::factory()->create(['role' => 'user']);

        $paket = Paket::create([ 'nama_paket' => 'Sampel', 'deskripsi' => 'Desc', 'harga' => 0 ]);
        $mapel = Mapel::create([ 'nama_mapel' => 'Matematika', 'paket_id' => $paket->id ]);

        $soal1 = Soal::create([
            'mapel_id' => $mapel->id,
            'pertanyaan' => '2+2=?',
            'pilihan_a' => '3',
            'pilihan_b' => '4',
            'pilihan_c' => '5',
            'pilihan_d' => '6',
            'jawaban_benar' => 'b',
        ]);

        // attach soal to paket
        $paket->soals()->attach($soal1->id);

        // Buy paket
        $response = $this->actingAs($user)->post(route('user.paket.beli', $paket));
        $response->assertRedirect(route('user.kerjakan'));

        // Submit tryout with correct answer
        $answers = [ $soal1->id => 'B' ];
        $submit = $this->actingAs($user)->post(route('user.tryout.submit', $paket), [ 'answers' => $answers ]);
        $submit->assertRedirect(route('user.result'));

        $this->assertDatabaseHas('jawaban_pesertas', ['user_id' => $user->id, 'soal_id' => $soal1->id]);
        $this->assertDatabaseHas('transaksis', ['user_id' => $user->id, 'paket_id' => $paket->id, 'status' => 'completed']);
    }

    public function test_profile_shows_active_and_completed_tryouts()
    {
        $user = User::factory()->create(['role' => 'user']);

        $paket = Paket::create([ 'nama_paket' => 'Sampel 2', 'deskripsi' => 'Desc', 'harga' => 0 ]);
        $mapel = Mapel::create([ 'nama_mapel' => 'Bahasa', 'paket_id' => $paket->id ]);

        $soal1 = Soal::create([
            'mapel_id' => $mapel->id,
            'pertanyaan' => 'Siapa presiden pertama RI?',
            'pilihan_a' => 'Soekarno',
            'pilihan_b' => 'Soeharto',
            'pilihan_c' => 'Habibie',
            'pilihan_d' => 'Gus Dur',
            'jawaban_benar' => 'a',
        ]);

        $paket->soals()->attach($soal1->id);

        // Buy paket
        $this->actingAs($user)->post(route('user.paket.beli', $paket));

        $profile = $this->actingAs($user)->get(route('user.profile'));
        $profile->assertSee($paket->nama_paket);

        // Submit tryout
        $answers = [ $soal1->id => 'A' ];
        $this->actingAs($user)->post(route('user.tryout.submit', $paket), ['answers' => $answers]);

        $profile2 = $this->actingAs($user)->get(route('user.profile'));
        $profile2->assertSee('Tryout Selesai');
        $profile2->assertSee('Lihat');
    }

    public function test_tryout_start_page_has_navigation_elements()
    {
        $user = User::factory()->create(['role' => 'user']);
        $paket = Paket::create([ 'nama_paket' => 'UI Test', 'deskripsi' => 'desc', 'harga' => 0 ]);
        $mapel = Mapel::create([ 'nama_mapel' => 'TIK', 'paket_id' => $paket->id ]);

        $soal = Soal::create([
            'mapel_id' => $mapel->id,
            'pertanyaan' => 'Uji navigasi?',
            'pilihan_a' => 'Ya',
            'pilihan_b' => 'Tidak',
            'pilihan_c' => 'Mungkin',
            'pilihan_d' => 'Tidak tahu',
            'jawaban_benar' => 'a',
        ]);
        $paket->soals()->attach($soal->id);

        $page = $this->actingAs($user)->get(route('user.tryout.start', $paket));
        $page->assertSee('Next');
        // the header shows 'Soal: 1' and the question counter renders inside a <span>, assert the visible header
        $page->assertSee('Soal: 1');
    }

    public function test_profile_displays_user_initials()
    {
        $user = User::factory()->create(['name' => 'Alpha Beta', 'role' => 'user']);

        $page = $this->actingAs($user)->get(route('user.profile'));
        $page->assertSee('AB');
    }
}
