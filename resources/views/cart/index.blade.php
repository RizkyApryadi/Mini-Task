<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff9e00;
            color: white;
            text-align: center;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .message {
            text-align: center;
            font-weight: bold;
            padding: 1rem;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }

        .cart-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .cart-item img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-right: 20px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .cart-item p {
            margin: 5px 0;
            color: #555;
        }

        .cart-item .remove-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cart-item .remove-btn:hover {
            background-color: #e60000;
        }

        .total {
            text-align: right;
            font-size: 20px;
            margin-top: 20px;
            color: #333;
        }

        .checkout-form {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .checkout-form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 250px;
            font-size: 16px;
        }

        .checkout-form button {
            padding: 10px 20px;
            background-color: #ff9e00;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .checkout-form button:hover {
            background-color: #ff8000;
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-item img {
                margin-bottom: 10px;
            }

            .cart-item-details {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Keranjang Belanja</h1>
    </header>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    <!-- Pesan Error -->
    @if (session('error'))
        <div class="message error">{{ session('error') }}</div>
    @endif

    <div class="cart-container">
        <ul>
            @forelse ($cart as $id => $item)
                <li class="cart-item">
                <img src="https://media.licdn.com/dms/image/v2/D5603AQG2Sy-d8pNQQg/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1730960713636?e=1737590400&v=beta&t=tPsajcdZccGiAxQlWp0MR9dQg4Tmp0ZlW-8NkjBGfyg" alt="{{ $item['name'] }}"> 
                <div class="cart-item-details">
                        <h2>{{ $item['name'] }}</h2>
                        <p>Harga: Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        <p>Jumlah: {{ $item['quantity'] }}</p>
                    </div>
                    <a href="{{ route('cart.remove', $id) }}" class="remove-btn">Hapus</a>
                </li>
            @empty
                <p>Keranjang kosong.</p>
            @endforelse
        </ul>

        <!-- Total Harga -->
        @if (!empty($cart))
            <div class="total">
                <strong>Total Harga:</strong> 
                Rp{{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 0, ',', '.') }}
            </div>
        @endif

        <!-- Form Checkout -->
        @if (!empty($cart))
            <div class="checkout-form">
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <label for="customer_name">Nama Pelanggan:</label>
                    <input type="text" id="customer_name" name="customer_name" required>
                    <button type="submit">Checkout</button>
                </form>
            </div>
        @endif
    </div>

</body>

</html>
