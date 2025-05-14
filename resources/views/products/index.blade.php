@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Product List</h1>

    

    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @auth
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                + Add Product
            </a>
        @endif
    @endauth


    <table class="w-full border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Name</th>
                <th class="p-2">Category</th>
                <th class="p-2">Price</th>
                <th class="p-2">Stock</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-t">
                    <td class="p-2">{{ $product->name }}</td>
                    <td class="p-2">{{ $product->category }}</td>
                    <td class="p-2">${{ $product->price }}</td>
                    <td class="p-2">{{ $product->stock_quantity }}</td>
                    <td class="p-2">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-green-600 hover:underline">Add to Cart</button>
                    </form>
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('products.edit', $product) }}" class="text-blue-500">Edit</a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 ml-2" onclick="return confirm('Delete this product?')">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
