<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailPenyewaan;
use App\Models\DetailVariantProduk;
use App\Models\Penyewaan;
use App\Models\Produk;
use App\Models\VariantProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function checkout($id_user)
    {
        try {
            $message_error = [
                'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
                'tanggal_mulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
                'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
                'tanggal_selesai.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
                'pesan.string' => 'Pesan harus berupa teks.',
                'pesan.max' => 'Pesan tidak boleh lebih dari 255 karakter.',
                'produk_details.required' => 'Detail produk wajib diisi.',
                'produk_details.array' => 'Detail produk harus berupa array.',
                'produk_details.*.id_produk.required' => 'ID produk wajib diisi.',
                'produk_details.*.id_produk.integer' => 'ID produk harus berupa angka.',
                'produk_details.*.warna.required' => 'Warna produk wajib diisi.',
                'produk_details.*.warna.string' => 'Warna produk harus berupa teks.',
                'produk_details.*.ukuran.required' => 'Ukuran produk wajib diisi.',
                'produk_details.*.ukuran.string' => 'Ukuran produk harus berupa teks.',
                'produk_details.*.qty.required' => 'Jumlah produk wajib diisi.',
                'produk_details.*.qty.integer' => 'Jumlah produk harus berupa angka.',
                'produk_details.*.subtotal.required' => 'Subtotal wajib diisi.',
                'produk_details.*.subtotal.integer' => 'Subtotal harus berupa angka.',
            ];

            request()->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'pesan' => 'nullable|string|max:255',
                'produk_details' => 'required|array',
                'produk_details.*.id_produk' => 'required|integer',
                'produk_details.*.warna' => 'required|string',
                'produk_details.*.ukuran' => 'required|string',
                'produk_details.*.qty' => 'required|integer',
                'produk_details.*.subtotal' => 'required|integer',
            ], $message_error);

            // Mengisi tabel penyewaan
            $table_penyewaan = new Penyewaan();
            $table_penyewaan->id_user = $id_user;
            $table_penyewaan->tanggal_mulai = request()->input('tanggal_mulai');
            $table_penyewaan->tanggal_selesai = request()->input('tanggal_selesai');
            $table_penyewaan->pesan = request()->input('pesan') ?: 'Tidak ada pesan';
            $table_penyewaan->status_penyewaan = 'Pending';
            $table_penyewaan->save();

            // Mengisi tabel detail_penyewaan
            $produk_details = request()->input('produk_details');

            foreach ($produk_details as $detail) {
                $table_detail_penyewaan = new DetailPenyewaan();
                $table_detail_penyewaan->id_penyewaan = $table_penyewaan->id;
                $table_detail_penyewaan->id_produk = $detail['id_produk'];
                $table_detail_penyewaan->warna_produk = $detail['warna'];
                $table_detail_penyewaan->ukuran = $detail['ukuran'];
                $table_detail_penyewaan->qty = $detail['qty'];
                $table_detail_penyewaan->subtotal = $detail['subtotal'];
                $table_detail_penyewaan->save();

                // Mengurangi stok produk di tabel detail_variant_produk
                $detail_variant_produk = DetailVariantProduk::join('variant_produk', 'detail_variant_produk.id_variant_produk', '=', 'variant_produk.id')
                    ->where('variant_produk.id_produk', $detail['id_produk'])
                    ->where('variant_produk.warna', $detail['warna'])
                    ->where('detail_variant_produk.ukuran', $detail['ukuran'])
                    ->select('detail_variant_produk.*')
                    ->first();

                if ($detail_variant_produk) {
                    $detail_variant_produk->stok -= $detail['qty'];
                    $detail_variant_produk->save();
                } else {
                    return response()->json([
                        'message' => 'Varian produk tidak ditemukan',
                        'id_produk' => $detail['id_produk'],
                        'warna' => $detail['warna'],
                        'ukuran' => $detail['ukuran']
                    ], 404);
                }
            }

            $detail_penyewaan = DetailPenyewaan::where('id_penyewaan', $table_penyewaan->id)->get();

            return response()->json([
                'message' => 'success',
                'penyewaan' => $table_penyewaan,
                'detail_penyewaan' => $detail_penyewaan,
            ], 200);
        } catch (\Exception $error) {
            Log::error($error->getMessage());
        }
    }

    public function pembayaran()
    {
    }
}
