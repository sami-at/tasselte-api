<x-admin-layout>
    <!-- Form to edit product details -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" class="border-gray-300 rounded-md" value="{{ $product->name }}">
        </div>
        <div>
            <label for="image" class="block">Image:</label>
            <input type="file" name="image" id="image" class="border-gray-300 rounded-md">
        </div>
        <div>
            <label for="price" class="block">Price:</label>
            <input type="text" name="price" id="price" class="border-gray-300 rounded-md" value="{{ $product->price }}">
        </div>
        <div>
            <label for="old_price" class="block">Old Price:</label>
            <input type="text" name="old_price" id="old_price" class="border-gray-300 rounded-md" value="{{ $product->old_price }}">
        </div>
        <div>
            <label for="discount" class="block">Discount:</label>
            <input type="text" name="discount" id="discount" class="border-gray-300 rounded-md" value="{{ $product->discount }}">
        </div>
        <div>
            <label for="description" class="block">Description:</label>
            <textarea name="description" id="description" class="border-gray-300 rounded-md">{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Product</button>
    </form>
</x-admin-layout>
