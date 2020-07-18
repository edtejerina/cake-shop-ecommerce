@extends('layouts.app')

@section('content')
        <div class="product container">
            <div class="product-flex">
                <div class="img-product">
                    <img src="/storage/products_img/{{ $product->img_url }}" alt="{{ $product->name }}">
                </div>
                <div class="info-product">
                    <h4>{{ $product->name }}</h4>
                    <span class="price">${{ $product->price }}</span>
                    <button class="btn btn-comprar">Comprar</button>
                    <div class="quantity view-product">
                        <input type="submit" class="btn-quantity" value="-" id="quantity-">
                        <input type="tel" class="value-quantity" value="1" id="quantity-cant">
                        <input type="submit" class="btn-quantity" value="+" id="quantity+">
                    </div>
                    <button class="btn btn-add-cart" onclick="saveProductCart({{$product}})">Agregar al carrito</button>
                </div>
            </div>
            <div class="details">
                <h3>Detalles</h3>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="container">
            <h3 class="title">Productos relacionados</h3>
            <div class="products-list">
                @foreach ($relatedProducts as $product)
                    @include('partials.product')
                @endforeach
            </div>
        </div>
@endsection
