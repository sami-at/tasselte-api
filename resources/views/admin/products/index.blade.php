<x-admin-layout>
    <!-- Add product button -->
    <div class="mt-10">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-20">Add Product</a>
    </div>
    <!-- Product table -->
    <table class="min-w-full divide-y divide-gray-200 mb-20">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Old Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($products as $product)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-12 w-12 cursor-pointer" onclick="openModal('{{ asset($product->image) }}')">
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->old_price }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->discount }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-green-600 hover:text-green-900 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block align-middle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 20a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1h5m5 0h4a1 1 0 011 1v4m0 5a1 1 0 01-1 1h-4m-5 0H6a1 1 0 01-1-1v-4m0-5a1 1 0 011-1h4" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div id="image-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-75">
        <img id="modal-image" src="" alt="" class="max-h-full max-w-full">
    </div>

    <script>
        function openModal(imageSrc) {
            const imageModal = document.getElementById('image-modal');
            const modalImage = document.getElementById('modal-image');
            modalImage.src = imageSrc;
            imageModal.classList.remove('hidden');
        }

        document.getElementById('image-modal').addEventListener('click', (e) => {
            const imageModal = document.getElementById('image-modal');
            if (e.target !== document.getElementById('modal-image')) {
                imageModal.classList.add('hidden');
            }
        });
    </script>
</x-admin-layout>
