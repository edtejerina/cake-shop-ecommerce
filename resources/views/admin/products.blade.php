@extends('admin.layout')

@section('content')
    <h2 class="text-dark pt-4 mb-4">Agregar producto</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select id="category" name="category" class="form-control">
                <option value="0" selected>Otro</option>
                @foreach ($categories as $category)
                    <option style="text-transform: capitalize" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" class="form-control" id="price" name="price" aria-describedby="emailHelp" step="0.01" placeholder="0,00">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" class="form-control-file" id="image" name="image">
          </div>
        <button type="submit" class="btn btn-dark">Agregar producto</button>
    </form>

    <h2 class="text-dark mt-5 mb-4">Productos</h2>
    <div class="products-container-admin">
        @foreach($products as $product)
            <div class="card mt-2">
                <img src="/storage/products_img/{{ $product->img_url }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <ul>
                        <li>Precio: ${{ $product->price }}</li>
                        <li>Stock: {{ $product->stock }}</li>
                        @if($product->category)
                            <li>Categoria: {{ $product->category->name }}</li>
                        @else
                            <li>Categoria: Sin categoria</li>
                        @endif
                    </ul>
                </div>
                <div class="card-footer">
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger w-100 mt-2 mb-2" type="submit">Eliminar</button>
                    </form>
                    {{-- <button class="btn btn-dark w-100 mt-2 mb-2">Editar</button> --}}
                </div>
            </div>
        @endforeach
    </div>
@endsection