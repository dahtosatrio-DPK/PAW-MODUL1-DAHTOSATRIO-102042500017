<?php
$produk_list = [
    [
        "nama" => "Kamera Mirrorless",
        "kategori" => "KAMERA",
        "harga" => 12500000,
        "stok" => 25
    ],
    [
        "nama" => "Tripod Aluminium",
        "kategori" => "TRIPOD",
        "harga" => 650000,
        "stok" => 40
    ],
    [
        "nama" => "Ring Light LED",
        "kategori" => "LIGHTING",
        "harga" => 450000,
        "stok" => 60
    ],
    [
        "nama" => "Microphone Condenser",
        "kategori" => "AUDIO",
        "harga" => 1500000,
        "stok" => 30
    ],
    [
        "nama" => "Memory Card 128GB",
        "kategori" => "PENYIMPANAN",
        "harga" => 280000,
        "stok" => 80
    ],
    [
        "nama" => "Gimbal Smartphone",
        "kategori" => "AKSESORIS",
        "harga" => 1100000,
        "stok" => 0
    ]
];

$total_produk = count($produk_list);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>

    <style>

        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: Arial, sans-serif; 
        }

        body { 
            padding: 20px; 
            background-color: #f8f9fa; 
        }
        
        /* Navbar menggunakan Flexbox */
        header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 20px 0; 
            border-bottom: 1px solid #ddd; 
            margin-bottom: 20px; 
        }

        nav { 
            display: flex; 
            gap: 15px; 
        }
        
        /* Hero Section */
        .hero { 
            background: #171923; 
            color: white; 
            padding: 50px; 
            border-radius: 10px; 
            margin-bottom: 40px; 
        }

        .hero h1 { 
            font-size: 32px; 
            margin-bottom: 10px; 
        }

        .hero button { 
            margin-top: 20px; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        }
        
        /* Bagian Atas Katalog */
        .catalog-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 20px; 
        }
        
        /* CSS Grid untuk Katalog Produk */
        .product-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 25px; 
            margin-bottom: 40px;
        }
        
        /* Styling Card */
        .card { 
            background: white; 
            padding: 20px; 
            border-radius: 8px; 
            border: 1px solid #ddd; 
            transition: transform 0.2s ease; 
        }

        .card:hover { 
            transform: translateY(-5px); 
        }

        .card .kategori { 
            font-size: 12px; 
            color: gray; 
            margin-bottom: 5px; 
        }

        .card h3 { 
            margin-bottom: 10px; 
        }

        .card .harga-normal { 
            text-decoration: line-through; 
            color: gray; 
            font-size: 14px; 
        }

        .card .harga-diskon { 
            color: #d32f2f; 
            font-weight: bold; 
            font-size: 18px; 
            margin-bottom: 10px; 
        }

        .card .harga-tetap { 
            font-weight: bold; 
            font-size: 18px; 
            margin-bottom: 10px; 
        }

        .card .stok { 
            font-size: 14px; 
            margin-bottom: 15px; 
        }

        .card .tersedia { 
            color: green; 
        }

        .card .habis { 
            color: red; 
        }
        
        /* Tombol Beli */
        .btn-beli { 
            background: #007bff; 
            color: white; 
            border: none; 
            padding: 10px; 
            width: 100%; 
            border-radius: 5px; 
            cursor: pointer; 
        }

        .btn-beli:hover { 
            opacity: 0.85; 
        }

        .btn-habis { 
            background: #ccc; 
            color: white; 
            border: none; 
            padding: 10px; 
            width: 100%; 
            border-radius: 5px; 
            cursor: not-allowed; 
        }
        
        /* Footer */
        footer { 
            text-align: center; 
            padding: 20px; 
            border-top: 1px solid #ddd; 
            margin-top: 20px; 
        }

        /* Responsive Layout */
        @media (max-width: 900px) {
            .product-grid { 
                grid-template-columns: repeat(2, 1fr); 
            }
        }

        @media (max-width: 600px) {
            .product-grid { 
                grid-template-columns: 1fr; 
            }
        }

    </style>
</head>

<body>

    <!-- Header / Navbar -->
    <header>
        <h2>Cia Store</h2>

        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <p>CIA STORE</p>

        <h1>Creative Gear Store.</h1>

        <p>
            Temukan berbagai perangkat fotografi dan perlengkapan 
            content creator untuk mendukung kebutuhanmu.
        </p>

        <button>Lihat Produk</button>
    </section>

    <!-- Informasi Produk -->
    <div class="catalog-header">

        <div>
            <p style="color: gray; font-size: 12px;">OUR PRODUCTS</p>
            <h2>Katalog Produk</h2>
        </div>

        <p>
            Total Produk: 
            <strong><?= $total_produk ?></strong>
        </p>

    </div>

    <!-- Katalog Produk -->
    <div class="product-grid">

        <?php foreach ($produk_list as $produk) : ?>
            
            <?php 
                // Logika Diskon
                $harga_awal = $produk["harga"];
                $is_diskon = false;
                
                if ($harga_awal >= 1000000) {

                    $is_diskon = true;

                    $nilai_diskon = $harga_awal * 0.10;

                    $harga_akhir = $harga_awal - $nilai_diskon;

                } else {

                    $harga_akhir = $harga_awal;

                }

                // Format Rupiah
                $format_harga_awal = "Rp" . number_format(
                    $harga_awal, 
                    0, 
                    ',', 
                    '.'
                );

                $format_harga_akhir = "Rp" . number_format(
                    $harga_akhir, 
                    0, 
                    ',', 
                    '.'
                );
            ?>

            <div class="card">

                <p class="kategori">
                    <?= $produk["kategori"] ?>

                    <?= $is_diskon ? " | DISKON 10%" : "" ?>
                </p>

                <h3>
                    <?= $produk["nama"] ?>
                </h3>
                
                <!-- Menampilkan Harga Berdasarkan Status Diskon -->
                <?php if ($is_diskon) : ?>

                    <p class="harga-normal">
                        <?= $format_harga_awal ?>
                    </p>

                    <p class="harga-diskon">
                        <?= $format_harga_akhir ?>
                    </p>

                <?php else : ?>

                    <p class="harga-tetap">
                        <?= $format_harga_akhir ?>
                    </p>

                <?php endif; ?>

                <!-- Logika Ketersediaan Stok -->
                <?php if ($produk["stok"] > 0) : ?>

                    <p class="stok tersedia">
                        Stok: <?= $produk["stok"] ?> 
                        (Tersedia)
                    </p>

                    <button class="btn-beli">
                        Beli Sekarang
                    </button>

                <?php else : ?>

                    <p class="stok habis">
                        Stok: 0 
                        (Stok Habis)
                    </p>

                    <button class="btn-habis" disabled>
                        Stok Habis
                    </button>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

    <!-- Footer -->
    <footer>
        <p>
            &copy; 2026 Cia Store. All rights reserved.
        </p>
    </footer>

</body>
</html>