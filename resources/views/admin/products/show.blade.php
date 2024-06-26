<x-admin-layout>
    <div class="max-w-3xl mx-auto mt-20 mb-20">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Product Details</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">View details for {{ $product->name }}</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->name }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Image</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                            <img id="product-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-40 w-auto cursor-pointer">
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Price</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->price }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Old Price</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->old_price }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Discount</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->discount }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->description }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="image-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-75">
        <img id="modal-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full max-w-full">
    </div>

    <script>
        // Get elements
        const productImage = document.getElementById('product-image');
        const imageModal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');

        // Open modal
        productImage.addEventListener('click', () => {
            imageModal.classList.remove('hidden');
        });

        // Close modal when clicking outside the image
        imageModal.addEventListener('click', (e) => {
            if (e.target !== modalImage) {
                imageModal.classList.add('hidden');
            }
        });
    </script>
</x-admin-layout>
