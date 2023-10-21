@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <h1 class="my-2">Page Modifica</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>Correggi gli errori:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf

            @method('PUT')

            <label for="title" class="mt-4">Titolo</label>
            <input class="form-control mt-2 @error('title') is-invalid @enderror" type="text" id="title" name="title"
                placeholder="Titolo" aria-label="default input example" value={{ old('title') ?? $comic->title }}>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="price" class="mt-4">Prezzo</label>
            <input class="form-control mt-2 @error('price') is-invalid @enderror" type="text" id="price"
                name="price" placeholder="Prezzo" aria-label="default input example"
                value={{ old('price') ?? $comic->price }}>

            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="thumb" class="form-label mt-4">URL</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                    name="thumb" aria-describedby="basic-addon3 basic-addon4" value={{ old('thumb') ?? $comic->thumb }}>

                @error('thumb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <label for="series" class="mt-4">Serie</label>
            <input class="form-control mt-2 @error('series') is-invalid @enderror" type="text" id="series"
                name="series" placeholder="Serie" aria-label="default input example"
                value={{ old('series') ?? $comic->series }}>

            @error('series')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="sale_date" class="mt-4">Data di acquisto</label>
            <input class="form-control mt-2 @error('sale_date') is-invalid @enderror" type="text" id="sale_date"
                name="sale_date" placeholder="Data di acquisto" aria-label="default input example"
                value={{ old('sale_date') ?? $comic->sale_date }}>

            @error('sale_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="type" class="mt-4">Genere</label>
            <input class="form-control mt-2 @error('type') is-invalid @enderror" type="text" id="type"
                name="type" placeholder="Genere" aria-label="default input example"
                value={{ old('type') ?? $comic->type }}>

            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="description" class="form-label mt-4">Descrizione</label>
            <textarea class="form-control mt-2 @error('description') is-invalid @enderror" type="text" id="description"
                name="description" placeholder="Descrizione" aria-label="default input example"> {{ old('description') ?? $comic->description }}</textarea>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button class="btn btn-success my-3">Salva</button>

        </form>

        <a href="{{ route('comics.index') }}" class="btn btn-primary my-3">Torna ai Fumetti</a>

    </section>
@endsection
