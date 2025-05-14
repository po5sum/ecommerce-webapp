@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Checkout</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('checkout.store') }}" class="space-y-4">
    @csrf

    <div>
        <label>Name</label>
        <input name="name" type="text" class="border rounded p-2 w-full" required value="{{ old('name') }}">
    </div>

    <div>
        <label>Email</label>
        <input name="email" type="email" class="border rounded p-2 w-full" required value="{{ old('email') }}">
    </div>

    <div>
        <label>Address</label>
        <input name="address" class="border rounded p-2 w-full" required value="{{ old('address') }}"></input>
    </div>

    <div>
        <label>Payment Type</label>
        <select name="payment_type" class="border rounded p-2 w-full">
            @error('payment_type')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            <option value="">Select one</option>
            <option value="credit">Credit Card</option>
            <option value="debit">Debit Card</option>
            <option value="cash">Pay Pal</option>
        </select>
    </div>

    <div class="font-bold text-lg">Total: ${{ $total }}</div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Place Order</button>
</form>
@endsection