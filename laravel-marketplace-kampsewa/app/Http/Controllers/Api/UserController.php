<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function detailUser($id_user)
    {
        try {
            // Ambil data user
            $get_data_user = User::select('id', 'name', 'email', 'nomor_telephone', 'foto', 'tanggal_lahir')
                ->where('id', $id_user)
                ->first();

            // Cek apakah data ada
            if (!$get_data_user) {
                return response()->json([
                    'message' => 'Data tidak ditemukan!',
                ], 404);
            }

            // Tampilkan respons data
            return response()->json([
                'message' => 'success',
                'data_users' => $get_data_user,
            ]);
        } catch (\Exception $e) {
            // Tangani pengecualian
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil data user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function editProfile($id_user, Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email,' . $id_user,
                'nomor_telephone' => 'required|string|max:13|min:11',
                'tanggal_lahir' => 'required|date',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Dapatkan user yang akan diperbarui
            $user = User::findOrFail($id_user);

            // Persiapan data yang akan diperbarui
            $update_data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'nomor_telephone' => $request->input('nomor_telephone'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
            ];

            // Jika ada file foto yang diunggah
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $destinationPath = public_path('assets/image/customers/profile');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                // Simpan path relatif ke database
                $foto_url = $filename;
                $update_data['foto'] = $foto_url;
            }

            // Update data user
            $user->update($update_data);

            // Tanggapan sukses
            return response()->json([
                'message' => 'Data berhasil diperbarui',
                'data' => $user,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tanggapan jika user tidak ditemukan
            return response()->json([
                'message' => 'User tidak ditemukan',
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tanggapan jika validasi gagal
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Tanggapan jika terjadi kesalahan lainnya
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function tambahAlamatUser(Request $request)
    {
        try {
            $request->validate([
                'id_user' => 'required|integer',
                'longitude' => 'required|string',
                'latitude' => 'required|string',
                'detail_lainnya' => 'nullable|string',
                'type' => 'nullable|integer',
            ]);

            $table_alamat = new Alamat();
            $table_alamat->id_user = $request->input('id_user');
            $table_alamat->longitude = $request->input('longitude');
            $table_alamat->latitude = $request->input('latitude');
            if ($request->input('detail_lainnya') == '' || $request->input('detail_lainnya') == null) {
                $table_alamat->detail_lainnya = 'Belum di isi.';
            } else {
                $table_alamat->detail_lainnya = $request->input('detail_lainnya');
            }
            $table_alamat->type = $request->input('type');
            $table_alamat->save();

            return response()->json([
                'message' => 'Alamat berhasil disimpan',
                'data disimpan' => $table_alamat,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menambah data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function pemesananUser($id_user)
    {
    }
    public function listAlamatUser($id_user)
    {
        try {
            $get_list_alamat = Alamat::where('id_user', $id_user)->get();
            if (!$get_list_alamat) {
                return response()->json([
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
            return response()->json([
                'message' => 'success',
                'alamat_user' => $get_list_alamat,
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menampilkan data alamat.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function detailAlamatUser($id_alamat)
    {
        try {
            $get_detail_alamat = Alamat::where('id', $id_alamat)->first();
            if ($get_detail_alamat) {
                return response()->json([
                    'message' => 'success',
                    'detail_alamat' => $get_detail_alamat,
                ], 200);
            }
            return response()->json([
                'message' => 'Terjadi kesalahan saat menampilkan data',
                'detail_alamat' => $get_detail_alamat,
            ], 404);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menampilkan detail data alamat.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function updateAlamatUser($id_alamat, Request $request)
    {
        try {
            $request->validate([
                'longitude' => 'required|string',
                'latitude' => 'required|string',
                'detail_lainnya' => 'nullable|string',
                'type' => 'nullable|integer',
            ]);

            $table_alamat = Alamat::where('id', $id_alamat)->update([
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'detail_lainnya' => $request->input('detail_lainnya'),
                'type' => $request->input('type'),
            ]);

            if ($table_alamat) {
                $alamat = Alamat::find($id_alamat);
                return response()->json([
                    'message' => 'success update',
                    'data_update' => $alamat
                ], 200);
            }

            return response()->json([
                'message' => 'Data tidak ada.',
            ], 404);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat update data alamat.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function updatePasswordUser($id_user)
    {
        try {
            request()->validate([
                'password' => 'required|string|max:20|min:8',
            ]);
            $table_user = User::where('id', $id_user)->update([
                'password' => bcrypt(request()->input('password')),
            ]);
            if ($table_user) {
                $user = User::find($id_user);
                return response()->json([
                    'message' => 'success update password',
                    'data_update' => $user,
                ], 200);
            }
            return response()->json([
                'message' => 'data tidak ada atau terjadi kesalahan saat update data',
            ], 404);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat update password.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}