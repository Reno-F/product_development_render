<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasil Kalkulator</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #e6e6fa;
        }

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

        /* Dropdown Menu */
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

        .main-box {
            margin: 50px auto;
            width: 70%;
            background-color: #f8e6f8;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .main-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
            font-size: 16px;
        }

        .input-group label {
            width: 150px;
            text-align: left;
            margin-right: 10px;
        }

        .result {
            display: inline-block;
            width: 200px;
            background-color: #f8d7da;
            padding: 5px;
            border-radius: 5px;
        }

        .button {
            background-color: #333;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #555;
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

<!-- Title -->
<div class="title">
    <a href="{{ route('home') }}" style="text-decoration: none; color: black;">
        Hidup <br> Sehat
    </a>
</div>

    <!-- Hasil Box -->
    <div class="main-box">
        <div class="main-title">
            Kalkulator Berat Badan Ideal dan Kalori Ideal
        </div>
        <div class="main-subtitle">
            HASIL
        </div>

        <div class="input-group">
            <label>Berat Badan Ideal :</label>
            <span class="result">{{ $bbi }} kg</span>
        </div>
        <div class="input-group">
            <label>Kalori Ideal :</label>
            <span class="result">{{ $kalori }} kcal</span>
        </div>
        <form action="{{ route('kalkulator') }}">
            <button class="button" type="submit">KEMBALI</button>
        </form>
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
