<x-app-layout>
    {{-- padding-vertikal-12 --}}
    <div class="py-12">


        {{-- lebar-max-7xl --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h1 class="text-3xl text-white text-center mb-5">Tambah Buku</h1>

                    {{-- jika ada error apapun --}}
                    @if ($errors->any())
                        <p class="text-center dark:text-red-400 mb-1">Terdapat error yang harus diselesaikan :</p>
                        <div class="text-center mb-3 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <ul class="space-y-1 list-disc list-inside">
                                {{-- lakukan pengulangan terhadap semua error sebagai $error --}}
                                @foreach($errors->all() as $error)
                                {{-- cetak value dari $error --}}
                                    <li class="font-medium">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>


                {{-- cetak rute admin.store_buku --}}
                <form method="POST" action="{{ route('admin.store_buku') }}" class="max-w-sm mt-5 mx-auto">
                    {{-- laravel mewajibkan keamanan dari serangan csrf --}}
                    @csrf
                    <div class="mb-5">
                        <label for="judul"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                        {{-- old('judul') berarti jika user salah memasukkan data atau validasi nya error maka value input nya masih ada atau tidak ke reset --}}
                        <input value="{{ old('judul') }}" name="judul" type="text" id="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            autocomplete="off" >
                    </div>
                    <div class="mb-5">
                        <label for="penulis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                        <input value="{{ old('penulis') }}" name="penulis" type="text" id="penulis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <div class="mb-5">
                        <label for="penerbit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                        <input value="{{ old('penerbit') }}" name="penerbit" type="text" id="penerbit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <div class="mb-5">
                        <label for="genre"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                        <input value="{{ old('genre') }}" name="genre" type="text" id="genre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <div class="mb-5">
                        <label for="jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input value="{{ old('penerbit') }}" name="jumlah" type="number" id="jumlah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <div class="mb-5">
                        <label for="gambar"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                        <input name="gambar" type="file" id="gambar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                        Data</button>
                </form>



            </div>

        </div>
    </div>
    </div>
</x-app-layout>
