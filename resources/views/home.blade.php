@extends('layouts.app')

@section('main-content')
    <section class="container mt-5 mb-2">
        <h1 class="mb-5">{{ $title }}</h1>
        <div class="row g-3">
            @foreach ($comics as $comic)
                <div class="col-6">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Titolo: </strong> {{ $comic->title }}</li>
                            <li class="list-group-item"><strong>Serie: </strong> {{ $comic->series }}</li>
                            <li class="list-group-item"><strong>Genere: </strong> {{ $comic->type }}</li>
                            <li class="list-group-item"><strong>Data di acquisto: </strong> {{ $comic->sale_date }}</li>
                            <li class="list-group-item"><strong>Prezzo: </strong> {{ $comic->price }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
@endsection
