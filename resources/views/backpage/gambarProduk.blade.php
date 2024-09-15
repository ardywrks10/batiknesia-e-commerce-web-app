<x-admin-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="container">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data Batik
        </h4>
        <div class="grid gap-6 mb-8 ">
            <div class="min-w-0 p-6 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    TABEL DATA GAMBAR BATIK
                </h4>
                <div class="flex mb-4">
                    <div class="w-1/4 ">
                        <span>
                            <a href="{{route('gambar.create')}}">
                                <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
                                    class="flex items-center justify-center text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-3  dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <p>Tambah Gambar</p>
                                </button>
                            </a>
                        </span>
                    </div>
                </div>

                <table class="mt-8 w-full border-collapse border border-gray-400 table-auto">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">Gambar</th>
                            <th class="border border-gray-200 px-4 py-2">Nama Produk</th>
                            <th class="border border-gray-200 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gambar as $item)
                        <tr>
                            <td class="border border-gray-200 px-4 py-2">
                            <img src="{{ asset($item->image) }}" alt=""
                                    class="w-full md:h-[60px] md:w-[60px]  h-48 inset-0 object-cover object-top rounded-lg"
                                    loading="lazy" />
                            </td>
                            <td class="border border-gray-200 px-4 py-2">{{ $item->product->title }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                <span class="flex">
                                    <a href="{{ route('gambar.edit', $item->id) }}" <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-lg active:bg-purple-600 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Like">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-pencil-square text-white-600"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                        </button>
                                    </a>

                                    <form action="{{ route('gambar.destroy', $item->id) }}" method="POST" class="ml-2 flex items-center font-medium text-red-600 dark:text-sky-500 hover:underline mr-2">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button type="button" onclick="confirmDelete(this.form)" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-purple" aria-label="Like">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6a.5.5 0 0 0-1 0Z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                     <div class="m-4">
                    </div>
                </div>
            </div>

        </div>

</x-admin-layout>
