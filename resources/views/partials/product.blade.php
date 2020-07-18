
    <div class="product-container">
        <div class="img-product">
            <img src="/storage/products_img/{{ $product->img_url }}" alt="product">
        </div>
        <div class="data-product">
            <h4>{{ $product->name }}</h4>
            <div class="price-cart">
                <span class="price">${{ $product->price }}</span>
                <a href="{{ route('cart.addtocart', $product->id) }}" class="btn btn-add-cart"">Agregar al carrito</a>
            </div>
        </div>
        <a href="{{ route('shop.show', $product) }}" class="btn btn-view-product">Ver Producto</a>    
    </div>