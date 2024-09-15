<x-admin-layout>
    <div>
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Input Data Gambar
            </h4>
            <div class="grid gap-6 mb-8 ">
                <div class="min-w-0 p-6 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Masukkan Data dibawah
                    </h4>
                    <form enctype="multipart/form-data"
                        action="{{(isset($gambar))?route('gambar.update',$gambar->id):route('gambar.store')}}"
                        method="POST">
                        @csrf
                        @if(isset($gambar))@method('PUT')@endif
                        <div class="grid grid-cols-2 grid-rows-1 gap-8">
                            <div class="mb-6">
                                <label for="product_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Produk</label>
                                <select id="product_id" name="product_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($produk as $item)
                                    <option value="{{ $item->id }}"
                                        {{ (isset($gambar) && $gambar->product_id == $item->id) || old('id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->title }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                            <div class="mb-6">
                                <label for="image"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                                <input type="file" id="image" name="image"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('image')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                Save Data
                                
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
