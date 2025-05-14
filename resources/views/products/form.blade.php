<div class="mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full p-2 border rounded">
</div>

<div class="mb-4">
    <label>Category</label>
    <input type="text" name="category" value="{{ old('category', $product->category ?? '') }}" class="w-full p-2 border rounded">
</div>

<div class="mb-4">
    <label>Description</label>
    <textarea name="description" class="w-full p-2 border rounded">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label>Price ($)</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}" class="w-full p-2 border rounded">
</div>

<div class="mb-4">
    <label>Stock Quantity</label>
    <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}" class="w-full p-2 border rounded">
</div>

<div class="mb-4">
    <label>Image</label>
    <input type="file" name="image" class="w-full p-2 border rounded">
    @if (isset($product) && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="mt-2 w-24 h-24 object-cover rounded">
    @endif
</div>
