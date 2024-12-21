<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidup Sehat</title> <!-- Jangan lupa menambahkan title halaman -->
    <!-- CSS Style -->
    <style>
        /* Gaya Umum */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #e6e6fa; /* Warna ungu muda */
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            font-size: 20px;
            color: black;
            position: relative;
        }

        .menu {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .menu-icon {
            font-size: 30px;
            margin-right: 10px;
        }

        .menu-text {
            font-weight: bold;
        }

        .dropdown {
            display: none; /* Disembunyikan secara default */
            position: absolute;
            top: 60px;
            left: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            width: 250px;
            z-index: 1000;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #ddd;
        }

        .dropdown a:last-child {
            border-bottom: none;
        }

        .dropdown a:hover {
            background-color: #f3f3f3;
        }

        .title {
            position: absolute;
            top: 20px;
            right: 50px;
            font-size: 36px;
            font-weight: bold;
            color: black;
        }

        /* Box Utama */
        .main-box {
            margin: 100px auto;
            width: 70%;
            background-color: #f3f1f4; /* Warna putih keabuan */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            border-radius: 10px;
        }

        .main-title {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .main-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .features {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .feature-item {
            margin-bottom: 10px;
        }

        .highlight {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="menu" id="menu-button">
            <span class="menu-icon">&#9776;</span>
            <span class="menu-text">MENU</span>
        </div>
        <!-- Dropdown Menu -->
        <div class="dropdown" id="dropdown-menu">
            <a href="{{ route('kalkulator') }}">Kalkulator Berat Badan & Kalori Ideal</a>
            <a href="{{ route('diet.program') }}">Kalkulator Kalori Makanan</a>
        </div>
    </div>

    <!-- Title (Link) -->
    <div class="title">
        <a href="{{ route('home') }}" style="text-decoration: none; color: black;">
            Hidup <br> Sehat
        </a>
    </div>

    <!-- Main Box -->
    <div class="main-box">
        <div class="main-title">
            Selamat datang di HIDUP SEHAT.
        </div>
        <div class="main-text">
            Disini kami siap untuk membantu kamu mewujudkan impian untuk memiliki berat badan yang ideal.
        </div>
        <div class="features">
            Tersedia 2 fitur yang bisa membantu kamu disini :
            <div class="feature-item">
                • <span class="highlight">Kalkulator</span> : Membantu kamu untuk menghitung berat badan ideal<br>
                &nbsp;&nbsp;&nbsp;&nbsp;dan jumlah kalori yang kamu butuhkan.
            </div>
            <div class="feature-item">
                • <span class="highlight">Diet Program</span> : Membantu kamu untuk memantau jumlah kalori yang<br>
                &nbsp;&nbsp;&nbsp;&nbsp;masuk ke dalam tubuh.
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        // Fungsi untuk menampilkan dan menyembunyikan dropdown
        document.getElementById('menu-button').addEventListener('click', function() {
            var dropdown = document.getElementById('dropdown-menu');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        });

        // Klik di luar dropdown untuk menutupnya
        window.addEventListener('click', function(event) {
            var dropdown = document.getElementById('dropdown-menu');
            var menuButton = document.getElementById('menu-button');
            if (!menuButton.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>
</body>
</html>
