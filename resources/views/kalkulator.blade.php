<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Berat Badan & Kalori Ideal</title>

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

        .main-box {
            margin: 50px auto;
            width: 70%;
            background-color: #f8e6f8;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 10px;
        }

        .main-title {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .input-group {
            display: flex;
            margin: 15px 0;
            justify-content: center;
            align-items: center;
        }

        .input-group label {
            width: 150px;
            text-align: left;
        }

        .input-group input {
            width: 200px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fddede;
        }

        .button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #555;
        }

        .result-box {
            margin-top: 20px;
            text-align: center;
        }

        .result-item {
            margin: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Title (Link ke Home) -->
    <div class="title">
        <a href="{{ route('home') }}" style="text-decoration: none; color: black;">
            Hidup <br> Sehat
        </a>
    </div>

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

    <!-- Main Box -->
    <div class="main-box">
        <div class="main-title">Kalkulator Berat Badan Ideal dan Kalori Ideal</div>

        @if (session('hasil'))
            <!-- Hasil Perhitungan -->
            <div class="result-box">
                <div class="result-item">
                    <strong>Berat Badan Ideal :</strong> {{ session('hasil')['berat_ideal'] }} kg
                </div>
                <div class="result-item">
                    <strong>Kalori Ideal :</strong> {{ session('hasil')['kalori_ideal'] }} kkal
                </div>
                <a href="{{ route('kalkulator.input') }}">
                    <button class="button">KEMBALI</button>
                </a>
            </div>
        @else
            <!-- Form Input -->
            <form method="POST" action="{{ route('kalkulator.hitung') }}">
                @csrf
                <div class="input-group">
                    <label for="age">Usia :</label>
                    <input type="number" id="age" name="age" placeholder="Masukkan Usia" required>
                </div>
                <div class="input-group">
                    <label for="height">Tinggi Badan :</label>
                    <input type="number" id="height" name="height" placeholder="Masukkan Tinggi (cm)" required>
                </div>
                <button type="submit" class="button">HITUNG</button>
            </form>
        @endif
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
