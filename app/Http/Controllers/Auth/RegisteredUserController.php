<?php

// pengelompokkan package
namespace App\Http\Controllers\Auth;

// import atau gunakan class
use App\Http\Controllers\Controller;
// import atau gunakan model untuk mengelola data
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman registrasi
     */
    // publik fungsi buat
    public function create(): View
    {
        // kembalikkan ke tampilan autentikasi.registrasi
        return view('auth.register');
    }

    /**
     * Tangani sebuah permintaan registrasi yang akan datang
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // publik fungsi simpan(Permintaan $permintaan): mengharapkan tanggapan mengalihkan
    public function store(Request $request): RedirectResponse
    {
        // $permintaan->validasi([])
        $request->validate([
            // value input name="name" wajib diisi, harus berupa string, maksimal karakter adalah 255
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            // lowercase berarti harus menggunakan huruf kecil, unik berarti nilai nya tidak boleh sama
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // confirmed berarti aku harus buat input konfirmasi password dan nilai input password harus sama dengan value input konfirmasi password, validasi tambahan nya ada di file Password.php
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // simpan data user yang di dapatkan dari formulir registrasi
        // berisi user::buat([])
        $user = User::create([
            // value column name akan diisi dengan value input name="name"
            'name' => $request->name,
            'email' => $request->email,
            // value input name="password" akan di hash terlebih dahulu sebelum disimpan ke dalam column password
            'password' => Hash::make($request->password),
        ]);

        // langsung registrasikan user
        // acara(baru Registrasi($pengguna))
        event(new Registered($user));

        // langsung loginkan user
        // autentikasi::gabung($pengguna)
        Auth::login($user);

        // kembali alihkan(PenyediaLayananRute::RUMAH)
        return redirect(RouteServiceProvider::HOME);
    }
}
