<?php

namespace Database\Seeders;

use App\Models\PersyaratanBerkas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersyaratanBerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (array_keys(config('layanan')) as $layanan) {
            PersyaratanBerkas::create([
                'layanan' => $layanan,
                'nama' => 'DNS',
            ]);
        }
    }
}
