<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = [
            [
                'nama' => 'Dr. Mohamad Aip Maptuh',
                'jabatan' => 'Ketua Yayasan',
                'spesialis' => 'Pembina Yayasan',
                'foto' => null // Gunakan null agar view menampilkan default user.jpeg
            ],
            [
                'nama' => 'Ai Nuraeni, S.Pd',
                'jabatan' => 'Kepala Sekolah',
                'spesialis' => 'Manajemen Sekolah',
                'foto' => null
            ],
            [
                'nama' => 'Edo Rosyada, S.Ag.',
                'jabatan' => 'Bendahara',
                'spesialis' => 'Keuangan & Administrasi',
                'foto' => null
            ],
            [
                'nama' => 'Wuri Hartini, S.Pd.I., Gr.',
                'jabatan' => 'Waka Bid. Kurikulum',
                'spesialis' => 'Kurikulum Merdeka',
                'foto' => null
            ],
            [
                'nama' => 'Er Jembari, S.H',
                'jabatan' => 'Waka Bid. Kesiswaan',
                'spesialis' => 'Kesiswaan & Karakter',
                'foto' => null
            ],
            [
                'nama' => 'Alia Nafis Fardiani, S.Pd',
                'jabatan' => 'Waka Bid. Sarpras',
                'spesialis' => 'Sarana & Prasarana',
                'foto' => null
            ],
            [
                'nama' => 'Nia Andria Is',
                'jabatan' => 'Waka Bid. Humas',
                'spesialis' => 'Hubungan Masyarakat',
                'foto' => null
            ],
            [
                'nama' => 'Ida Lidia Sari, S.Pd',
                'jabatan' => 'Pembina OSIS',
                'spesialis' => 'Organisasi Siswa',
                'foto' => null
            ],
            [
                'nama' => 'Nuraeni Hamidah, S.E',
                'jabatan' => 'Wali Kelas Fase E',
                'spesialis' => 'Guru Kelas',
                'foto' => null
            ],
            [
                'nama' => 'Iis Siti Aisyah, S.Pd',
                'jabatan' => 'Wali Kelas Fase F Tk. XI',
                'spesialis' => 'Guru Kelas',
                'foto' => null
            ],
            [
                'nama' => 'Ida Lidia Sari, S.Pd',
                'jabatan' => 'Wali Kelas Fase F Tk. XII',
                'spesialis' => 'Guru Kelas',
                'foto' => null
            ]
        ];

        foreach ($staff as $index => $s) {
            \App\Models\Staff::create([
                'nama' => $s['nama'],
                'jabatan' => $s['jabatan'],
                'spesialis' => $s['spesialis'],
                'foto' => $s['foto']
            ]);
        }
    }
}
