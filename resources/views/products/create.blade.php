@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Product</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @include('products.form')
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Product</button>
    </form>
@endsection
