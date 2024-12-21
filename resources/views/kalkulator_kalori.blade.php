<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Kalori</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #d5d6f9;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #d5d6f9;
        }

        .menu-text {
            display: flex;
            align-items: center;
            font-size: 18px;
            background-color: #c6c6c6;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu-icon {
            width: 24px;
            height: 18px;
            margin-right: 8px;
            display: inline-block;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="18"><rect y="0" width="24" height="3" fill="black"/><rect y="7" width="24" height="3" fill="black"/><rect y="14" width="24" height="3" fill="black"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: bold;
            color: #3d3d3d;
            display: block; /* Selalu tampil */
        }

        .menu {
            display: none;
            position: absolute;
            top: 50px;
            left: 0;
            background-color: #f4f4f4;
            width: 200px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }

        .menu-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .menu-item a {
            text-decoration: none;
            color: #3d3d3d;
            font-weight: bold;
        }

        .menu-item a:hover {
            color: #000;
        }

        .title {
            text-align: center;
            margin-top: 30px;
            font-size: 20px;
            font-weight: bold;
            color: #3d3d3d;
        }

        .content {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }

        .form-container {
            display: inline-block;
            background-color: #f4d3f4;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group label {
            display: inline-block;
            text-align: left;
            font-size: 16px;
            width: 100px;
            color: #3d3d3d;
        }

        .form-group input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 80px;
            font-size: 14px;
        }

        .btn {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #333;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #3d3d3d;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="menu-text" id="menuToggle">
            <div class="menu-icon"></div>
            MENU
        </div>
        <a href="{{ url('/') }}" class="sidebar-title">Hidup Sehat</a>
    </div>

    <div class="menu" id="menu">
        <div class="menu-item"><a href="{{ route('kalkulator') }}">Kalkulator Berat Badan & Kalori Ideal</a></div>
        <div class="menu-item"><a href="{{ route('diet.program') }}">Kalkulator Kalori Makanan</a></div>
    </div>

    <div class="title">Kalkulator Kalori Makanan</div>

    <div class="content">
        <div class="form-container">
            <h3 style="margin-bottom: 20px; color: #3d3d3d;">MASUKKAN</h3>
            <form id="calorieForm">
                <div class="form-group">
                    <label for="makanan_a">Makanan A</label>
                    <input type="text" id="makanan_a" placeholder="Makanan">
                    <input type="number" id="jumlah_a" placeholder="Jumlah">
                </div>
                <div class="form-group">
                    <label for="makanan_b">Makanan B</label>
                    <input type="text" id="makanan_b" placeholder="Makanan">
                    <input type="number" id="jumlah_b" placeholder="Jumlah">
                </div>
                <div class="form-group">
                    <label for="makanan_c">Makanan C</label>
                    <input type="text" id="makanan_c" placeholder="Makanan">
                    <input type="number" id="jumlah_c" placeholder="Jumlah">
                </div>
                <button type="button" class="btn" onclick="calculateCalories()">HITUNG</button>
            </form>
            <div id="result" class="result"></div>
        </div>
    </div>

    <script>
        function calculateCalories() {
            // Valid makanan dan kalori per 150 gram
            const validMakanan = {
                "nasi": 130,
                "sayur kangkung": 18.9,
                "ayam cincang": 160
            };

            // Ambil input dari form
            const makananA = document.getElementById('makanan_a').value.toLowerCase();
            const jumlahA = parseInt(document.getElementById('jumlah_a').value);
            const makananB = document.getElementById('makanan_b').value.toLowerCase();
            const jumlahB = parseInt(document.getElementById('jumlah_b').value);
            const makananC = document.getElementById('makanan_c').value.toLowerCase();
            const jumlahC = parseInt(document.getElementById('jumlah_c').value);

            // Validasi input
            if (!(makananA in validMakanan && makananB in validMakanan && makananC in validMakanan)) {
                document.getElementById('result').innerText = "Makanan harus nasi, sayur kangkung, atau ayam cincang.";
                return;
            }

            if (jumlahA !== 150 || jumlahB !== 150 || jumlahC !== 150) {
                document.getElementById('result').innerText = "Jumlah setiap makanan harus 150.";
                return;
            }

            // Hitung total kalori
            const totalKalori = validMakanan[makananA] + validMakanan[makananB] + validMakanan[makananC];
            document.getElementById('result').innerText = `Total Kalori: ${totalKalori} kalori`;
        }

        // Toggle menu visibility
        document.getElementById('menuToggle').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
        });
    </script>
</body>
</html>
