@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Your Cart</h2>

@if(session('success'))
    <div class="bg-green-100 p-2 mb-4 rounded text-green-800">
        {{ session('success') }}
    </div>
@endif

@if(count($cart))
    <table class="w-full border mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Product</th>
                <th class="p-2">Price</th>
                <th class="p-2">Quantity</th>
                <th class="p-2">Subtotal</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
                <tr class="border-t">
                    <td class="p-2">{{ $item['name'] }}</td>
                    <td class="p-2">${{ $item['price'] }}</td>
                    <td class="p-2">
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="inline">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 p-1 border rounded">
                            <button type="submit" class="text-blue-500 ml-2">Update</button>
                        </form>
                    </td>
                    <td class="p-2">${{ $item['price'] * $item['quantity'] }}</td>
                    <td class="p-2">
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-right font-bold text-lg">Total: ${{ $total }}</p>
@else
    <p>Your cart is empty.</p>
@endif
@endsection
