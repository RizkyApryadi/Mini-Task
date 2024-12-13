<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Tambah produk ke keranjang
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika produk belum ada di keranjang
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Hapus produk dari keranjang
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang!');
    }

    // Checkout dan simpan pesanan
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        // Validasi input customer_name
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

        // Jika keranjang kosong, tampilkan error
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        // Menghitung total harga
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Simpan pesanan ke database
        $order = Order::create([
            'customer_name' => $validated['customer_name'], // Gunakan data yang telah divalidasi
            'cart' => json_encode($cart), // Menyimpan keranjang dalam format JSON
            'total' => $total, // Menyimpan total harga
        ]);

        // Kosongkan keranjang setelah checkout
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Checkout berhasil! Pesanan Anda telah disimpan.');
    }
}
