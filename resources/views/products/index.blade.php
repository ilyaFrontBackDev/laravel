@extends('layouts.app')

@section('content')
    <h1>Товары</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                - {{ $product->price }} (Остаток: {{ $product->quantity }})
            </li>
        @endforeach
    </ul>
@endsection
