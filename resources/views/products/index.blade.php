<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
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

        main {
            padding: 3rem 1.5rem;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            list-style: none;
            padding: 0;
        }

        .product-item {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .product-item h2 {
            font-size: 1.5rem;
            margin-bottom: 0.8rem;
            color: #007bff;
        }

        .product-item p {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .product-item .price {
            font-weight: bold;
            font-size: 1.2rem;
            color: #ff9e00;
        }

        .product-item .stock {
            font-size: 1rem;
            color: #28a745;
        }

        .product-item .add-to-cart {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 2rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .product-item .add-to-cart:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .product-item .add-to-cart:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .product-item h2 {
                font-size: 1.2rem;
            }

            .product-item .price {
                font-size: 1rem;
            }

            .product-item .stock {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Katalog Produk</h1>
    </header>

    <main>
        <ul class="product-list">
            @foreach ($products as $product)
                <li class="product-item">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="price">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="stock">Stok: {{ $product->stock }}</p>
                    <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart">Tambah ke Keranjang</a>
                </li>
            @endforeach
        </ul>
    </main>

</body>

</html>
        