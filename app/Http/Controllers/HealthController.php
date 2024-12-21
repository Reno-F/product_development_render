<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    // Halaman utama
    public function index()
    {
        return view('home');
    }

    // Kalkulator berat badan
    public function kalkulator()
    {
        return view('kalkulator');
    }

    public function hitungKalkulator(Request $request)
    {
        // Validasi input
        $request->validate([
            'tinggi' => 'required|numeric',
            'berat' => 'required|numeric',
        ]);

        $tinggi = $request->tinggi / 100; // Convert cm to m
        $berat = $request->berat;

        // Rumus BMI
        $bmi = $berat / ($tinggi * $tinggi);
        $kategori = '';

        if ($bmi < 18.5) {
            $kategori = 'Kurus';
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $kategori = 'Normal';
        } elseif ($bmi >= 25 && $bmi < 30) {
            $kategori = 'Berat Badan Berlebih';
        } else {
            $kategori = 'Obesitas';
        }

        return view('kalkulator', [
            'bmi' => number_format($bmi, 2),
            'kategori' => $kategori,
        ]);
    }

    // Diet Program (contoh sederhana)
    public function kalkulatorKalori()
    {
        $kalori = 2000; // Default rekomendasi
        return view('kalkulator.kalori', ['kalori' => $kalori]);
    }
}
