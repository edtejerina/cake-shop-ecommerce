@extends('layouts.app')

@section('content')

    @include('partials.search')
    
    <div class="results container">
        @if(isset($categorySelect)) 
            <h3 class="title">Resultados: {{ $categorySelect }}</h3>
            <div class="products-list">
                @foreach ($products as $product)
                    @include('partials.product')
                @endforeach
            </div>
        @endif
    </div>
    
@endsection