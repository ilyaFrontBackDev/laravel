@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Цена: {{ $product->price }}</p>
    <p>Остаток на складе: {{ $product->quantity }}</p>
    @if ($product->quantity > 0)
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="form-inline" data-form="form">
            @csrf
            <div class="row align-items-center mb-3">
                <div class="col-auto">
                    <button type="button" class="btn btn-light" data-form="minus">-</button>
                </div>
                <div class="col-auto">
                    <input type="number"
                           name="quantity"
                           value="1" min="1"
                           class="form-control"
                           style="width: 100px; text-align: center;"
                           data-form="input"
                    >
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-light" data-form="plus">+</button>
                </div>
            </div>
            <button type="submit" class="btn btn-light">Добавить в корзину</button>
        </form>
    @else
        <p>Нет в наличии</p>
    @endif
@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Input({
            form: document.querySelector('[data-form="form"]'),
            maxQuantity: {{ $product->quantity }}
        }).init();
    })
</script>
