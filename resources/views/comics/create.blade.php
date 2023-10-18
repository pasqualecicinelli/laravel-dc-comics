@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <label for="title" class="mt-4">Titolo</label>
            <input class="form-control mt-2" type="text" id="title" name="title" placeholder="Titolo"
                aria-label="default input example">

            <label for="price" class="mt-4">Prezzo</label>
            <input class="form-control mt-2" min="0" max="900" type="number" id="price" name="price"
                placeholder="Prezzo" aria-label="default input example">

            <label for="description" class="form-label mt-4">Descrizione</label>
            <textarea class="form-control mt-2" type="text" id="description" name="description" placeholder="Descrizione"
                aria-label="default input example"></textarea>

            <button class="btn btn-success my-3">Salva</button>

        </form>



        <a href="{{ route('comics.index') }}" class="btn btn-primary my-3">Torna ai Fumetti</a>

    </section>
@endsection
