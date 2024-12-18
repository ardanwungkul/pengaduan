<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriInstansi;
use App\Models\KategoriPelapor;
use App\Models\SubjekLaporan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'superadmin',
            ],
            [
                'name' => 'Ardan',
                'email' => 'ardanwungkul143@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
            ],
        ];
        $kategoriPelapor = [
            ['nama_kategori' => 'Masyarakat Umum'],
            ['nama_kategori' => 'Instansi Pemerintah'],
            ['nama_kategori' => 'Organisasi Perangkat Daerah'],
        ];
        $subjekLaporan = [
            [
                'id' => 1,
                'nama_subjek' => 'Dugaan tindak pidana Korupsi dan delik gratifikasi',
            ],
            [
                'id' => 2,
                'nama_subjek' => 'Menyalahgunakan kewenangan karena jabatan',
            ],
            [
                'id' => 3,
                'nama_subjek' => 'Pelanggaran terhadap Kode Etik dan/atau perilaku ASN',
            ],
            [
                'id' => 4,
                'nama_subjek' => 'Pelanggaran Sumpah Jabatan dan Disiplin ASN',
            ],
            [
                'id' => 5,
                'nama_subjek' => 'Perbuatan Tercela, yaitu perbuatan amoral, asusila dan perbuatan yang tidak selayaknya dilakukan oleh ASN',
            ],
            [
                'id' => 7,
                'nama_subjek' => 'Pelanggaran Hukum baik dilakukan dengan sengaja maupun karena kelalaian dan ketidakpahaman',
            ],
            [
                'id' => 8,
                'nama_subjek' => 'Mal Administrasi, yaitu terjadinya kesalahan, kekeliruan dan kelalaian yang bersifat administratif',
            ],
            [
                'id' => 9,
                'nama_subjek' => 'Pelayanan publik yang tidak memuaskan yang dapat merugikan pihak-pihak yang berkepentingan serta masyarakat secara umum',
            ],
            [
                'id' => 50,
                'nama_subjek' => 'Pelanggaran Lainnya',
            ],
        ];
        $kategoriOpd = [
            ['id' => 1, 'kategori_id' => 3, 'nama' => 'Badan Perencanaan Pembangunan Daerah Penelitian dan Pengembangan'],
            ['id' => 2, 'kategori_id' => 3, 'nama' => 'Badan Keuangan Aset Daerah'],
            ['id' => 3, 'kategori_id' => 3, 'nama' => 'Badan Pendapatan Daerah'],
            ['id' => 4, 'kategori_id' => 3, 'nama' => 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia'],
            ['id' => 5, 'kategori_id' => 3, 'nama' => 'Badan Kesatuan Bangsa dan Politik'],
            ['id' => 6, 'kategori_id' => 3, 'nama' => 'Badan Penanggulangan Bencana Daerah'],
            ['id' => 7, 'kategori_id' => 3, 'nama' => 'Dinas Kesehatan'],
            ['id' => 10, 'kategori_id' => 3, 'nama' => 'Dinas Pendidikan dan Kebudayaan'],
            ['id' => 11, 'kategori_id' => 3, 'nama' => 'Dinas Pekerjaan Umum dan Tata Ruang'],
            ['id' => 12, 'kategori_id' => 3, 'nama' => 'Dinas Perumahan Kawasan Permukiman dan Pertanahan'],
            ['id' => 13, 'kategori_id' => 3, 'nama' => 'Dinas Pemadam Kebakaran'],
            ['id' => 14, 'kategori_id' => 3, 'nama' => 'Dinas Sosial'],
            ['id' => 15, 'kategori_id' => 3, 'nama' => 'Dinas Tenaga Kerja dan Transmigrasi'],
            ['id' => 16, 'kategori_id' => 3, 'nama' => 'Dinas Pengendalian Penduduk, Keluarga Berencana. PPPA'],
            ['id' => 17, 'kategori_id' => 3, 'nama' => 'Dinas Ketahanan Pangan'],
            ['id' => 18, 'kategori_id' => 3, 'nama' => 'Dinas Lingkungan Hidup'],
            ['id' => 19, 'kategori_id' => 3, 'nama' => 'Dinas Kependudukan dan Pencatatan Sipil'],
            ['id' => 20, 'kategori_id' => 3, 'nama' => 'Dinas Pemberdayaan Masyarakat dan Desa'],
            ['id' => 21, 'kategori_id' => 3, 'nama' => 'Dinas Perhubungan'],
            ['id' => 22, 'kategori_id' => 3, 'nama' => 'Dinas Komunikasi, Informatika, Statistik dan Persandian'],
            ['id' => 23, 'kategori_id' => 3, 'nama' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu'],
            ['id' => 24, 'kategori_id' => 3, 'nama' => 'Dinas Pemuda, Olahraga dan Pariwisata'],
            ['id' => 25, 'kategori_id' => 3, 'nama' => 'Dinas Kearsipan dan Perpustakaan'],
            ['id' => 26, 'kategori_id' => 3, 'nama' => 'Dinas Perikanan'],
            ['id' => 27, 'kategori_id' => 3, 'nama' => 'Dinas Tanaman Pangan dan Hortikultura'],
            ['id' => 28, 'kategori_id' => 3, 'nama' => 'Dinas Perkebunan dan Peternakan'],
            ['id' => 30, 'kategori_id' => 3, 'nama' => 'Dinas Perindustrian, Perdagangan dan Koperasi, Usaha Kecil dan Menengah'],
            ['id' => 35, 'kategori_id' => 3, 'nama' => 'Satuan Polisi Pamong Praja'],
            ['id' => 36, 'kategori_id' => 3, 'nama' => 'Inspektorat Kabupaten'],
            ['id' => 37, 'kategori_id' => 3, 'nama' => 'Sekretariat DPRD'],
            ['id' => 38, 'kategori_id' => 3, 'nama' => 'Sekretariat Daerah'],
            ['id' => 40, 'kategori_id' => 3, 'nama' => 'Kantor Camat Tanah Grogot'],
            ['id' => 41, 'kategori_id' => 3, 'nama' => 'Kantor Camat Pasir Belengkong'],
            ['id' => 42, 'kategori_id' => 3, 'nama' => 'Kantor Camat Kuaro'],
            ['id' => 43, 'kategori_id' => 3, 'nama' => 'Kantor Camat Long Ikis'],
            ['id' => 44, 'kategori_id' => 3, 'nama' => 'Kantor Camat Long Kali'],
            ['id' => 45, 'kategori_id' => 3, 'nama' => 'Kantor Camat Batu Sopang'],
            ['id' => 46, 'kategori_id' => 3, 'nama' => 'Kantor Camat Muara Komam'],
            ['id' => 47, 'kategori_id' => 3, 'nama' => 'Kantor Camat Batu Engau'],
            ['id' => 48, 'kategori_id' => 3, 'nama' => 'Kantor Camat Tanjung Harapan'],
            ['id' => 49, 'kategori_id' => 3, 'nama' => 'Kantor Camat Muara Samu'],
        ];


        User::insert($users);
        SubjekLaporan::insert($subjekLaporan);
        KategoriPelapor::insert($kategoriPelapor);
        KategoriInstansi::insert($kategoriOpd);
    }
}
