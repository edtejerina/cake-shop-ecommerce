@extends('admin.layout')

@section('content')
    <section>
        <h2 class="text-dark pt-4 mb-4">Agregar categoria</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-dark">Agregar categoria</button>
        </form>
    </section>
    <section>
        <h2 class="text-dark mt-5 mb-4">Categorias</h2>
        <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">{{ $category->name }}
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </li>
            @endforeach
          </ul>
    </section>
@endsection