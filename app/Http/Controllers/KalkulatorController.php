<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('kalkulator');
    }

    public function hitung(Request $request)
    {
        // Ambil input dari form
        $gender = $request->input('gender');
        $age = $request->input('age');
        $height = $request->input('height');

        // Logika perhitungan Berat Badan Ideal (BBI) & Kalori Ideal (contoh sederhana)
        $bbi = 0.9 * ($height - 100); // Formula dasar untuk berat badan ideal
        if ($gender == 'P' || $gender == 'p') {
            $bbi *= 0.9; // Penyesuaian untuk perempuan
        }

        $kalori = $bbi * 25; // Estimasi kebutuhan kalori ideal per hari

        // Kirim hasil ke view
        return view('hasil_kalkulator', [
            'bbi' => number_format($bbi, 2),
            'kalori' => number_format($kalori, 2)
        ]);
    }
}
