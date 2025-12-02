<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Soal;
use DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Paket 1
        $paket1 = Paket::create([
            'nama_paket' => 'TryOut UTBK (1 Paket)',
            'deskripsi' => 'Berisi 1x TryOut dengan hasil & pembahasan otomatis',
            'harga' => 80000,
        ]);

        // Create Mapel for Paket 1
        $mapel1 = Mapel::create([
            'nama_mapel' => 'Matematika',
            'paket_id' => $paket1->id,
        ]);

        // Create Soal for Mapel 1
        $soal1 = Soal::create([
            'mapel_id' => $mapel1->id,
            'pertanyaan' => 'Berapakah hasil dari 2 + 2?',
            'pilihan_a' => '3',
            'pilihan_b' => '4',
            'pilihan_c' => '5',
            'pilihan_d' => '6',
            'jawaban_benar' => 'B',
        ]);

        $soal2 = Soal::create([
            'mapel_id' => $mapel1->id,
            'pertanyaan' => 'Berapakah akar kuadrat dari 16?',
            'pilihan_a' => '2',
            'pilihan_b' => '3',
            'pilihan_c' => '4',
            'pilihan_d' => '5',
            'jawaban_benar' => 'C',
        ]);

        $soal3 = Soal::create([
            'mapel_id' => $mapel1->id,
            'pertanyaan' => 'Berapakah hasil dari 5 x 6?',
            'pilihan_a' => '25',
            'pilihan_b' => '30',
            'pilihan_c' => '35',
            'pilihan_d' => '40',
            'jawaban_benar' => 'B',
        ]);

        $soal4 = Soal::create([
            'mapel_id' => $mapel1->id,
            'pertanyaan' => 'Berapakah hasil dari 10 / 2?',
            'pilihan_a' => '3',
            'pilihan_b' => '4',
            'pilihan_c' => '5',
            'pilihan_d' => '6',
            'jawaban_benar' => 'C',
        ]);

        $soal5 = Soal::create([
            'mapel_id' => $mapel1->id,
            'pertanyaan' => 'Berapakah hasil dari 7 + 8?',
            'pilihan_a' => '14',
            'pilihan_b' => '15',
            'pilihan_c' => '16',
            'pilihan_d' => '17',
            'jawaban_benar' => 'B',
        ]);

        // Attach soals to paket1 via pivot table
        DB::table('paket_soal')->insert([
            ['paket_id' => $paket1->id, 'soal_id' => $soal1->id],
            ['paket_id' => $paket1->id, 'soal_id' => $soal2->id],
            ['paket_id' => $paket1->id, 'soal_id' => $soal3->id],
            ['paket_id' => $paket1->id, 'soal_id' => $soal4->id],
            ['paket_id' => $paket1->id, 'soal_id' => $soal5->id],
        ]);

        // Create Paket 2
        $paket2 = Paket::create([
            'nama_paket' => 'TryOut UTBK (3 Paket)',
            'deskripsi' => 'Berisi 3x TryOut dengan hasil & pembahasan otomatis',
            'harga' => 290000,
        ]);

        // Create Mapel for Paket 2
        $mapel2 = Mapel::create([
            'nama_mapel' => 'Bahasa Inggris',
            'paket_id' => $paket2->id,
        ]);

        // Create Soal for Mapel 2
        $soal6 = Soal::create([
            'mapel_id' => $mapel2->id,
            'pertanyaan' => 'What is the synonym of "happy"?',
            'pilihan_a' => 'Sad',
            'pilihan_b' => 'Joyful',
            'pilihan_c' => 'Angry',
            'pilihan_d' => 'Tired',
            'jawaban_benar' => 'B',
        ]);

        $soal7 = Soal::create([
            'mapel_id' => $mapel2->id,
            'pertanyaan' => 'Choose the correct sentence: "She ___ to school every day."',
            'pilihan_a' => 'go',
            'pilihan_b' => 'goes',
            'pilihan_c' => 'going',
            'pilihan_d' => 'gone',
            'jawaban_benar' => 'B',
        ]);

        // Attach soals to paket2 via pivot table
        DB::table('paket_soal')->insert([
            ['paket_id' => $paket2->id, 'soal_id' => $soal6->id],
            ['paket_id' => $paket2->id, 'soal_id' => $soal7->id],
        ]);
    }
}
