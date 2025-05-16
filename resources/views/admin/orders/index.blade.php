@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">All Orders</h2>

@if ($orders->isEmpty())
    <p>No orders found.</p>
@else
    @foreach ($orders as $order)
        <div class="mb-6 border p-4 rounded shadow bg-white">
            <h3 class="text-lg font-semibold mb-2">Order #{{ $order->id }}</h3>

            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>Payment:</strong> {{ ucfirst($order->payment_type) }}</p>
            <p><strong>Total:</strong> ${{ $order->total }}</p>

            <h4 class="font-semibold mt-4">Items:</h4>
            <ul class="list-disc list-inside">
                @foreach ($order->items as $item)
                    <li>{{ $item->product_name }} × {{ $item->quantity }} (${{ $item->price }})</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif
@endsection
