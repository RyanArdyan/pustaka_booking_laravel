<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBukuController extends Controller
{
    // method untuk menampilkan data buku
    public function index() {
        // kembalikkan ke tampilan admin.buku.index
        return view('admin.buku.index');
    }

    // untuk menampilkan formulir tambah buku
    public function create() {
        // kembalikkan ke tampilan admin.buku.create
        return view('admin.buku.create');
    }

    // untuk menyimpan data buku baru
    // $request berisi semua value input
    public function store(Request $request) {
        // dd($request->all());
        // validasi formulir dan jika validasi nya menemukan error maka dia akan kembali url sebelumnya, misalnya dari url /admin/create-buku maka akan kembali ke url /admin/create-buku
        // berisi $permintaan->validasi([])
        $validasi = $request->validate([
            // value input name="judul" itu wajib diisi, value nya tidak boleh sama dan maksimal nya adalah 255
            'judul' => ['required', 'string', 'unique:buku', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'jumlah' => ['required', 'integer', 'max:10000'],
            // file yg divalidasi harus memiliki tipe mime yg sesuai yaitu jpg dan lain-lain
            'gambar' => ['required', 'mimes:jpg,png,jpeg', 'max:512']
        ]);

        // jika lolos dari validasi maka ubah nama gambar menjadi buku_timenya.jpg lalu simpan ke local

        // simpan buku

        // alihkan ke rute admin.buku
    }
}
