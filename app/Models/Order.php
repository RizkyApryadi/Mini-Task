<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Kolom yang dapat diisi (fillable).
     *
     * @var array
     */
    protected $fillable = [
        'customer_name',
        'total_price',
        'status',
        'cart', // Menambahkan cart agar bisa diisi
    ];

    /**
     * Kolom yang akan di-cast.
     *
     * @var array
     */
    protected $casts = [
        'cart' => 'array', // Menyimpan cart sebagai array atau JSON
    ];

    /**
     * Relasi ke tabel order_items (jika ada).
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
