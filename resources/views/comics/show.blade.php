@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <div class="card w-50">
            <div class="card-title text-center">
                <h3>Titolo: {{ $comic->title }}</h3>
                <h3>Descrizione: {{ $comic->description }}</h3>
                <h3>Prezzo: {{ $comic->price }}</h3>
            </div>
        </div>

        <a href={{ route('comics.index') }} class="btn btn-primary mt-3">Back</a>
    </section>
@endsection
