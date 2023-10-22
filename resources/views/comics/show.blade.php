@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <h1 class="my-2"> Dettaglio del Fumetto</h1>

        <a href={{ route('comics.index') }} class="btn btn-primary my-3">Indietro</a>
        <a href={{ route('comics.edit', $comic) }} class="btn btn-warning my-3">Modifica</a>

        <div class="row">
            <div class="col-8 d-flex">
                <div class="col-6">
                    <div class="card border-0 m-2">
                        <div class="card-title">
                            <h4>Titolo: </h4>
                            <div>{{ $comic->title }}</div>
                        </div>
                    </div>
                    <div class="card border-0 m-2">
                        <div class="card-title">
                            <h4>Prezzo: </h4>
                            <div>${{ $comic->price }}</div>
                        </div>
                    </div>
                    <div class="card border-0 m-2">
                        <div class="card-title">
                            <h4>Serie: </h4>
                            <div>{{ $comic->series }}</div>
                        </div>
                    </div>
                    <div class="card border-0 m-2">
                        <div class="card-title">
                            <h4>Data di acquisto: </h4>
                            <div>{{ $comic->sale_date }}</div>
                        </div>
                    </div>
                    <div class="card border-0 m-2">
                        <div class="card-title">
                            <h4>Genere: </h4>
                            <div>{{ $comic->type }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-6">

                    <div class="card border-0 m-2">
                        <div class="card-title">
                            <h4>Descrizione: </h4>
                            <div>{{ $comic->description }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="card border-0 m-2">
                    <div class="card-title">
                        <h4>Copertina Fumetto: </h4>

                    </div>
                    <img src="{{ $comic->thumb }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
