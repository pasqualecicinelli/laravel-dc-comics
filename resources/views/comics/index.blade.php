@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <h1 class="my-2"> Mostra i Fumetti</h1>

        <a href={{ route('comics.create') }} class="btn btn-primary my-2">Aggiungi un nuovo Fumetto</a>



        @foreach ($comics as $comic)
            <ul class="list-group mt-5 w-50">

                <li class="list-group-item ">
                    <strong>Id:</strong> {{ $comic->id }}
                </li>
                <li class="list-group-item">

                    <strong>Titolo:</strong> {{ $comic->title }}

                    <a href={{ route('comics.show', $comic) }}><i class="fa-solid fa-eye"></i></a>

                    <a href={{ route('comics.edit', $comic) }}><i
                            class="fa-solid text-warning fa-pen-to-square px-2"></i></a>

                    <!-- Button trigger modal -->
                    <a href="#" type="button" data-bs-toggle="modal"
                        data-bs-target="#delete-modal-{{ $comic->id }}">
                        <i class="fa-solid text-danger fa-trash-can"></i>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="delete-modal-{{ $comic->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModal"> Vuoi eliminare
                                        questo fumetto?
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $comic->title }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annulla</button>


                                    <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Elimina</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


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
