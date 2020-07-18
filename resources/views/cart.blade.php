@extends('layouts.app')
<style>
    footer{
        display: none;
    }
</style>
@section('content')

    <?php $total = 0; ?>

    <div class="cart container">
        <h3 class="title">Mi carrito</h3>
        <div class="products-cart">
            @if(session('cart'))
                @foreach(session('cart') as $product)
                    <?php $total += $product['price'] * $product['quantity'] ?>
                    <div class="product-cart">
                        <div class="img-product img-product-cart">
                            <img src="/storage/products_img/{{ $product['img_url'] }}" alt="product">
                        </div>  
                        <div>
                        <h4>{{ $product['name'] }}</h4>
                            <span class="price">${{ $product['price'] }}</span>
                        </div>
                        <div class="quantity quantity-cart">
                            <form action="{{ route('cart.reduce', $product['id']) }}" method="GET">
                                <input type="submit" class="btn-quantity" value="-">
                            </form>
                            <input type="tel" class="value-quantity" value="{{ $product['quantity'] }}" id="quantity-cant">
                            <form action="{{ route('cart.addtocart', $product['id']) }}" method="GET">
                                <input type="submit" class="btn-quantity" value="+">
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="total-price">
        <div class="container">
            <div class="total">
                <h3>Total:</h3>
                <span class="price">${{ $total }}</span>
            </div>
            <button class="btn btn-comprar">Comprar</button>
        </div>
    </div>
@endsection


