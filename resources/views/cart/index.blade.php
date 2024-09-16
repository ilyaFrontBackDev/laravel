@extends('layouts.app')

@section('content')
    <h1>Корзина</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}
                <form action="{{ route('cart.remove', $product->id) }}" method="POST" data-form="form" data-quantity="{{ $product->quantity }}">
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            <button type="button" class="btn btn-light" data-form="minus">-</button>
                        </div>
                        <div class="col-auto">
                            <input type="number"
                                   name="quantity"
                                   value="{{ min($product->quantity, $product->selectedQuantity) }}" min="1"
                                   class="form-control"
                                   style="width: 100px; text-align: center;"
                                   data-form="input"
                            >
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-light" data-form="plus">+</button>
                        </div>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-light">Удалить</button>
                </form>
            </li>

        @endforeach
    </ul>
    @if (!count($products) == 0)
        <a href="{{ route('checkout') }}">Оформить заказ</a>
    @else
        <p>Добавьте товаров в корзину</p>
        <a href="{{ url('/') }}">Вернуться</a>
    @endif
@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let forms = document.querySelectorAll('[data-form="form"]');
        forms.forEach(form => {
            new Input({
                form: form,
                maxQuantity: form.dataset.quantity
            }).init();
        })
    })
</script>
