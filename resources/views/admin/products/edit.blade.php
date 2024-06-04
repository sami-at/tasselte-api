<x-admin-layout>
    <!-- Form to edit product details -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto mt-20 mb-20 ">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Name" required />
        </div>
        <!-- Display the current image -->
        <!-- Display the current image -->
        <div id="currentImageContainer">
            @if ($product->image)
                <img id="currentImage" src="{{ asset($product->image) }}" alt="Current Image" class="mb-3 max-w-xs max-h-40">
            @endif
        </div>

        <!-- File input field for updating the image -->
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image:</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_help" id="imageInput" type="file" name="image">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">Please upload an image for the product.</div>
        </div>


        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" required />
        </div>
        <div id="discount_fields" class="hidden">
            <div class="mb-5">
                <label for="old_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Price:</label>
                <input type="number" step="0.01" name="old_price" id="old_price" value="{{ $product->old_price }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Old Price" />
            </div>
            <div class="mb-5">
                <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount:</label>
                <input type="number" name="discount" id="discount" value="{{ $product->discount }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Discount" />
            </div>
        </div>
        <div class="mb-5">
            <label for="toggle_discount" class="inline-flex items-center cursor-pointer">
                <input type="checkbox" id="toggle_discount" name="toggle_discount" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Discount</span>
            </label>
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
            <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Description" required>{{ $product->description }} </textarea>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Product</button>
    </form>
</x-admin-layout>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleDiscount = document.getElementById('toggle_discount');
        const discountFields = document.getElementById('discount_fields');

        toggleDiscount.addEventListener('change', function () {
            if (this.checked) {
                discountFields.classList.remove('hidden');
            } else {
                discountFields.classList.add('hidden');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const priceInput = document.getElementById('price');
        const oldPriceInput = document.getElementById('old_price');
        const discountInput = document.getElementById('discount');

        priceInput.addEventListener('input', calculateDiscount);
        oldPriceInput.addEventListener('input', calculateDiscount);

        function calculateDiscount() {
            const price = parseFloat(priceInput.value);
            const oldPrice = parseFloat(oldPriceInput.value);
            const discount = (oldPrice - price) / oldPrice * 100;
            discountInput.value = Math.round(discount); // Round the discount to the nearest integer
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('imageInput');
        const currentImageContainer = document.getElementById('currentImageContainer');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const currentImage = currentImageContainer.querySelector('#currentImage');
                    if (currentImage) {
                        currentImage.src = e.target.result;
                    } else {
                        const newImage = document.createElement('img');
                        newImage.src = e.target.result;
                        newImage.alt = 'Current Image';
                        newImage.className = 'mb-3 max-w-xs max-h-40';
                        newImage.id = 'currentImage';
                        currentImageContainer.appendChild(newImage);
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

