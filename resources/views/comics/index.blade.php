@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        @foreach ($comics as $comic)
            <ul class="list-group mt-5 w-50">

                <li class="list-group-item ">
                    <strong>Titolo:</strong> {{ $comic->title }} <a href={{ route('comics.show', $comic->id) }}><i
                            class="fa-solid fa-eye"></i> </a>
                </li>
                <li class="list-group-item">
                    <strong>Descrizione:</strong> {{ $comic->description }}
                </li>
                <li class="list-group-item">
                    <strong>Prezzo:</strong> {{ $comic->price }}
                </li>
            </ul>
        @endforeach

    </section>
@endsection
