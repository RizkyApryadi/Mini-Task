<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to E-Commerce</title>
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
            text-align: center;
        }

        main p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #555;
        }

        a {
            display: inline-block;
            margin: 1rem 1rem;
            padding: 0.75rem 2rem;
            background-color: #ff9e00;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1.1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #e68900;
            transform: translateY(-5px);
        }

        a:active {
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            main p {
                font-size: 1rem;
            }

            a {
                font-size: 1rem;
                padding: 0.5rem 1.5rem;
            }
        }

    </style>
</head>

<body>

    <header>
        <h1>Selamat Datang di E-Commerce</h1>
    </header>

    <main>
        <p>Platform belanja online terbaik untuk memenuhi kebutuhan Anda, kapan saja dan di mana saja!</p>
        <a href="{{ route('products.index') }}">Lihat Produk</a>
        <a href="{{ route('cart.index') }}">Keranjang Belanja</a>
    </main>

</body>

</html>
