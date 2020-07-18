<form action="{{ route('shop.search') }}" method="POST" class="searcher container">
    {{ csrf_field() }}
    <div class="select">
        <select name="category" id="category">
            <option value="todos" selected>Todos</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            <option value="otros">Otros</option>
            </select>
    </div>
    <button type="submit" class="btn-search">Buscar</button>
</form>