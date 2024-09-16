@extends('layouts.app')

@section('content')
    <form action="{{ route('order.place') }}" method="POST" class="container mt-5">
        @csrf
        <div class="form-group mb-4">
            <label for="name">Имя получателя:</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-light">Оформить заказ</button>
    </form>
@endsection
