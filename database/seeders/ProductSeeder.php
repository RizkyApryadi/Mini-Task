<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data sebelumnya
        DB::table('products')->truncate();

        // Menambahkan data baru
        \App\Models\Product::create([
            'name' => 'Produk A',
            'description' => 'Deskripsi Produk A',
            'price' => 100000,
            'stock' => 50,
        ]);
        \App\Models\Product::create([
            'name' => 'Produk B',
            'description' => 'Deskripsi Produk B',
            'price' => 150000,
            'stock' => 30,
        ]);
    }
}
