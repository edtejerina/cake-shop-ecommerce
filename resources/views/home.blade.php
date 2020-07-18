@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="filter-hero"></div>
        <h2>#QuedateEnCasa</h2>
    </div>

    @include('partials.search')
    
    <div class="container">
        <h3 class="title">Productos recientes</h3>
        <div class="products-list"> 
            @foreach ($products as $product)
                @include('partials.product')
            @endforeach
        </div>
    </div>
@stop

