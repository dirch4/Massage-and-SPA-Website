<?php

namespace Database\Seeders;

use App\Models\perawatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyTreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataLayanan = [
            [
                'nama_perawatan' => 'Pijat Bolus Herbal',
                'harga' => 100000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1 jam'
            ],
            [
                'nama_perawatan' => 'Pijat Khas',
                'harga' => 150000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1,5 jam'
            ],
            [
                'nama_perawatan' => 'Hot & Cold Stone Massage',
                'harga' => 200000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1,5 jam'
            ],
            [
                'nama_perawatan' => 'Bamboo Massage',
                'harga' => 200000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '2 jam'
            ],
            [
                'nama_perawatan' => 'Authentic Thai Massage',
                'harga' => 100000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1 jam'
            ],   
            [
                'nama_perawatan' => 'Pregnancy Massage',
                'harga' => 100000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1 jam'
            ], 
            [
                'nama_perawatan' => 'Balinese Massage',
                'harga' => 100000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1,2 jam'
            ], 
            [
                'nama_perawatan' => 'Traditional Javanese Massage',
                'harga' => 150000,
                'deskripsi' => 'Perawatan wajah',
                'gambar' => 'facial.jpg',
                'durasi' => '1,5 jam'
            ]
        ];
            foreach ($dataLayanan as $key => $layanan) {
                perawatan::create($layanan);
            }
           
    }
}
