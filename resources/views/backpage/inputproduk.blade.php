<x-admin-layout>
    <div>
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Input Data Batik
            </h4>
            <div class="grid gap-6 mb-8 ">
                <div class="min-w-0 p-6 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Masukkan Data dibawah
                    </h4>
                    <form enctype="multipart/form-data"
                        action="{{(isset($produk))?route('batik.update',$produk->id):route('batik.store')}}"
                        method="POST">
                        @csrf
                        @if(isset($produk))@method('PUT')@endif
                        <div class="grid grid-cols-2 grid-rows-1 gap-8">
                            <div>
                                <div class="mb-6">
                                    <label for="default-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Produk</label>
                                    <input required type="text" id="title" name="title"
                                        value="{{(isset($produk))?$produk->title:old('title')}}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('title')
                                    <div class="text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="default-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                        Produk</label>
                                    <input required type="text" id="slug" name="slug"
                                        value="{{(isset($produk))?$produk->slug:old('slug')}}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('slug')
                                    <div class="text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div>
                                <div class="mb-6">
                                    <label for="default-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                                        Produk</label>
                                    <textarea required id="description" name="description"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        {{(isset($produk))?$produk->description:old('description')}}
                                    </textarea>
                                    @error('description')
                                    <div class="text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok Cadangan</label>
                            <input required type="number" id="inStock" name="inStock"
                                value="{{(isset($produk))?$produk->inStock:old('inStock')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('inStock')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                Produk</label>
                            <input required type="number" id="quantity" name="quantity"
                                value="{{(isset($produk))?$produk->quantity:old('quantity')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('quantity')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                Produk</label>
                            <input required type="number" id="price" name="price"
                                value="{{(isset($produk))?$produk->price:old('price')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('price')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="brand_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjual atau
                                Seller</label>
                            <select id="brand_id" name="brand_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($seller as $item)
                                <option value="{{ $item->id }}"
                                    {{ (isset($produk) && $produk->brand_id == $item->id) || old('id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_seller')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                            <!-- Add more options as needed -->
                            </select>
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

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>