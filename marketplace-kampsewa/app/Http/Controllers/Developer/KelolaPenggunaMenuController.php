<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelolaPenggunaMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('dev');
    }
    public function index()
    {
        $data = [
            [
                'nama' => 'Allysa Safitri',
                'alamat' => 'Rogojampi, Kota Banyuwangi',
                'status' => 'Customer',
                'nomor' => '081331640909',
                'bergabung' => '13 Agustus 2024',
                'total-product' => 104,
                'gender' => 'Perempuan',
            ],
            [
                'nama' => 'Budi Santoso',
                'alamat' => 'Jalan Merdeka No. 10, Jakarta',
                'status' => 'Customer',
                'nomor' => '081234567890',
                'bergabung' => '20 Januari 2023',
                'total-product' => 78,
                'gender' => 'Laki-laki',
            ],
            [
                'nama' => 'Citra Wijaya',
                'alamat' => 'Bandung, Jawa Barat',
                'status' => 'Customer',
                'nomor' => '087654321098',
                'bergabung' => '5 Mei 2022',
                'total-product' => 156,
                'gender' => 'Perempuan',
            ],
            // Tambahkan data lainnya di sini sesuai kebutuhan
            [
                'nama' => 'Dewi Rahayu',
                'alamat' => 'Surabaya, Jawa Timur',
                'status' => 'Customer',
                'nomor' => '085678954321',
                'bergabung' => '10 September 2023',
                'total-product' => 92,
                'gender' => 'Perempuan',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'alamat' => 'Yogyakarta',
                'status' => 'Customer',
                'nomor' => '081239876543',
                'bergabung' => '3 Maret 2022',
                'total-product' => 120,
                'gender' => 'Laki-laki',
            ],
            [
                'nama' => 'Fitriani',
                'alamat' => 'Medan, Sumatera Utara',
                'status' => 'Customer',
                'nomor' => '082165478932',
                'bergabung' => '15 Juli 2023',
                'total-product' => 84,
                'gender' => 'Perempuan',
            ],
            [
                'nama' => 'Guntur Wicaksono',
                'alamat' => 'Semarang, Jawa Tengah',
                'status' => 'Customer',
                'nomor' => '089876543210',
                'bergabung' => '25 November 2022',
                'total-product' => 68,
                'gender' => 'Laki-laki',
            ],
            [
                'nama' => 'Hani Fadilah',
                'alamat' => 'Pekanbaru, Riau',
                'status' => 'Customer',
                'nomor' => '081357246801',
                'bergabung' => '7 April 2023',
                'total-product' => 102,
                'gender' => 'Perempuan',
            ],
            [
                'nama' => 'Irfan Abdullah',
                'alamat' => 'Makassar, Sulawesi Selatan',
                'status' => 'Customer',
                'nomor' => '082189765432',
                'bergabung' => '19 Oktober 2022',
                'total-product' => 113,
                'gender' => 'Laki-laki',
            ],
            [
                'nama' => 'Juwita Anggraini',
                'alamat' => 'Padang, Sumatera Barat',
                'status' => 'Customer',
                'nomor' => '087612345678',
                'bergabung' => '30 Desember 2023',
                'total-product' => 79,
                'gender' => 'Perempuan',
            ],
        ];

        return view('developers.kelola-pengguna', ['title' => 'Kelola Pengguna | Developer Kamp Sewa', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
