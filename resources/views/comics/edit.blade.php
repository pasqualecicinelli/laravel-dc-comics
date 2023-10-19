@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <h1 class="my-2">Page Modifica</h1>

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf

            @method('PUT')

            <label for="title" class="mt-4">Titolo</label>
            <input class="form-control mt-2" type="text" id="title" name="title" placeholder="Titolo"
                aria-label="default input example" value={{ $comic->title }}>

            <label for="price" class="mt-4">Prezzo</label>
            <input class="form-control mt-2" min="0" max="90" type="text" id="price" name="price"
                placeholder="Prezzo" aria-label="default input example" value={{ $comic->price }}>

            <label for="thumb" class="form-label mt-4">URL</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                <input type="text" class="form-control" id="thumb" name="thumb"
                    aria-describedby="basic-addon3 basic-addon4" value={{ $comic->thumb }}>
            </div>

            <label for="series" class="mt-4">Serie</label>
            <input class="form-control mt-2" type="text" id="series" name="series" placeholder="Serie"
                aria-label="default input example" value={{ $comic->series }}>

            <label for="sale_date" class="mt-4">Data di acquisto</label>
            <input class="form-control mt-2" type="text" id="sale_date" name="sale_date" placeholder="Data di acquisto"
                aria-label="default input example" value={{ $comic->sale_date }}>

            <label for="type" class="mt-4">Genere</label>
            <input class="form-control mt-2" type="text" id="type" name="type" placeholder="Genere"
                aria-label="default input example" value={{ $comic->type }}>

            <label for="description" class="form-label mt-4">Descrizione</label>
            <textarea class="form-control mt-2" type="text" id="description" name="description" placeholder="Descrizione"
                aria-label="default input example"></textarea>

            <button class="btn btn-success my-3">Salva</button>

        </form>

        <a href="{{ route('comics.index') }}" class="btn btn-primary my-3">Torna ai Fumetti</a>

    </section>
@endsection
