@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <h1 class="my-2"> Mostra i Fumetti</h1>

        <a href={{ route('comics.create') }} class="btn btn-primary my-2">Aggiungi un nuovo Fumetto</a>



        @foreach ($comics as $comic)
            <ul class="list-group mt-5 w-50">

                <li class="list-group-item ">
                    <strong>Titolo:</strong> {{ $comic->title }}

                    <a href={{ route('comics.show', $comic) }}><i class="fa-solid fa-eye"></i></a>

                    <a href={{ route('comics.edit', $comic) }}><i
                            class="fa-solid text-warning fa-pen-to-square px-2"></i></a>

                    <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button><i class="fa-solid text-danger fa-trash-can"></i></button>

                    </form>

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
