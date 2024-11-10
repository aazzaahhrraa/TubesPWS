<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pencarian Makanan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<body>
      <div class="main-container">
        <!-- Carousel Section -->
        <div id="foodCarousel" class="carousel slide mb-8" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1500">
                    <img id="home-carousel-img" src="{{ asset('images/background3.png') }}" alt="Indonesian Cuisine" class="carousel-img">
                </div>
            </div>            

            <!-- Navbar -->
            <div class="navbar-container">
                <nav id="home-navbar" class="navbar">
                    <ul class="navbar-menu">
                        <li><a href="{{ url('/') }}" class="navbar-link">Home</a></li>
                        <li><a href="{{ url('/map') }}" class="navbar-link" id="find-food-btn">Find a food</a></li>
                        <li><a href="{{ url('/about') }}" class="navbar-link">About</a></li>
                    </ul>
                </nav>
            </div>
            

            <!-- Categories Section -->
            <div class="category-box">
                <div class="category-item">
                    <span class="category-text">Kategori</span>
                </div>
                <div class="category-item">
                    <span class="category-text">History</span>
                </div>
                <div class="category-item">
                    <span class="category-text">Our Team</span>
                </div>
                <div class="category-item">
                    <span class="category-text">Login</span>
                </div>
            </div>

            <!-- Gastronesia Section -->
            <div class="gastronesia-section">
                <h2 class="gastronesia-title">Gastronesia</h2>
                <p class="gastronesia-description">
                    Gastronesia adalah situs web yang didedikasikan untuk memperkenalkan kekayaan kuliner Indonesia kepada masyarakat luas. Situs ini berfokus pada berbagai hidangan khas dari lima pulau utama Indonesia, yaitu Sumatera, Jawa, Kalimantan, Sulawesi, dan Papua yang mewakili keragaman cita rasa dan tradisi kuliner yang dimiliki oleh setiap daerah. Melalui artikel-artikel yang disajikan, Gastronesia mengupas asal-usul setiap hidangan, kisah budaya yang menyertainya, serta bahan-bahan unik yang menjadi ciri khas masakan tersebut. Meskipun tidak menyediakan resep, Gastronesia menekankan pemahaman dan apresiasi terhadap kuliner Indonesia, sehingga pembaca dapat lebih mengenal kekayaan rasa dan budaya di balik setiap hidangan.
                </p>
            </div>
        </div>
    </div>
</body>
    <style>
        /* Disable Scroll */
        body, html {
            overflow: hidden; /* Menghilangkan scroll */
            height: 100%;
        }

        .main-container {
            height: 100vh; /* Menjaga agar container mengambil seluruh layar */
            position: relative;
            overflow: hidden; /* Menghindari scroll */
        }

        .carousel-inner {
            width: 100%;
            height: 100vh; /* Tinggi penuh layar */
            position: relative;
        }

        .carousel-img {
            width: 100%;
            height: 100vh;
            object-fit: cover; /* Menjaga gambar memenuhi area tanpa terdistorsi */

        }

        .navbar-container {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.95); /* Warna latar belakang lebih gelap untuk navbar */
            border-radius: 20px;
            padding: 15px 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5); /* Tambahkan bayangan agar navbar lebih pop-up */
        }

        .navbar-menu {
            list-style: none;
            display: flex;
            gap: 40px;
            margin: 0;
            padding: 0;
            justify-content: center;
        }

        .navbar-link {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 8px 16px; /* Memberikan sedikit padding untuk kotak */
            border-radius: 5px; /* Agar kotak sedikit melengkung */
            transition: all 0.3s ease; /* Efek transisi untuk perubahan */
        }

        .navbar-link:hover {
            background-color: #fff; /* Ubah latar belakang menjadi putih */
            color: #000; /* Ubah warna teks menjadi hitam */
            transform: scale(1.1); /* Efek membesar saat hover */
            box-shadow: 0px 4px 8px rgba(0, 0, 0 , 0.3); /* Tambahkan bayangan untuk kesan tombol */
        }

        .category-box {
            display: flex;
            justify-content: center;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            background: linear-gradient(to top, rgba(249, 171, 4, 0.711) 50%, rgba(0, 0, 0, 0) 50%); /* Gradien setengah warna hitam */
            border-radius: 0px;
            padding: 20px 40px;
            gap: 20px;
        }

        .category-item {
            display: flex;
            align-items: center;
            transition: transform 0.3s, color 0.3s, box-shadow 0.3s; /* Tambahkan transisi untuk bayangan */
            cursor: pointer;
            padding: 15px 20px; /* Tambahkan padding untuk kategori */
            border-radius: 10px; /* Sudut membulat */
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.934), rgba(0, 0, 0, 0.94)); /* Gradien latar belakang */
            color: white; /* Warna teks */
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3); /* Bayangan untuk kategori */
        }

        .category-item:hover {
            transform: scale(1.05); /* Efek membesar saat hover */
            box-shadow: 0px 4px 16px rgb(252, 252, 252); /* Tambahkan bayangan saat hover */
            background-color: #ffffff; /* Mengubah background menjadi putih saat hover */
            color: #ffffff; /* Mengubah warna teks menjadi hitam agar kontras dengan background putih */
        }


        .category-text {
            font-weight: 700;
            font-size: 18px; /* Ukuran font lebih besar */
            letter-spacing: 1.2px;
            margin-left: 10px; /* Jarak antara ikon dan teks */
        }

        .gastronesia-section {
            position: absolute;
            top: 45%;
            left: 400px; /* Jarak dari sisi kiri */
            right: 400px;
            transform: translateY(-50%); /* Memusatkan secara vertikal */
            color: rgb(255, 255, 255); /* Warna teks */
            padding: 50px;
            margin-top: 10px;
            /* background-color: rgba(0, 0, 0, 0.246); 
            border-radius: 60px; 
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0);  */
        }

        .gastronesia-title {
            text-align: center;
            font-size: 100px; /* Ukuran font untuk judul */
            font-weight: bold; /* Membuat judul lebih tebal */
            margin-bottom: 10px; /* Jarak antara judul dan deskripsi */
            color: white; /* or any color that contrasts */
            text-shadow: 2px 2px 4px rgb(0, 0, 0);
        }

        .gastronesia-description {
            text-align: center;
            font-size: 20px; /* Ukuran font untuk deskripsi */
            line-height: 1.5; /* Jarak antar baris */
            text-shadow: 2px 2px 4px rgb(0, 0, 0);

        }

        /* Responsif untuk ukuran layar kecil */
        @media (max-width: 768px) {
            .navbar-menu {
                gap: 20px;
            }

            .category-box {
                gap: 15px;
                padding: 10px 20px;
            }

            .category-item {
                font-size: 16px; /* Ukuran font lebih kecil untuk layar kecil */
            }

            .navbar-link {
                font-size: 16px;
            }

            .gastronesia-section {
                left: 10px; /* Mengurangi jarak dari sisi kiri untuk layar kecil */
                padding: 15px; /* Mengurangi padding untuk layar kecil */
            }

            .gastronesia-title {
                font-size: 20px; /* Ukuran font lebih kecil untuk judul */
            }

            .gastronesia-description {
                font-size: 14px; /* Ukuran font lebih kecil untuk deskripsi */
            }
        }
    </style>
</html>