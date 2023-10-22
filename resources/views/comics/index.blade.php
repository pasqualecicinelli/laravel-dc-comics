@extends('layouts.app')

@section('main-content')
    <section class="container my-3">

        <h1 class="my-2"> Lista dei Fumetti</h1>

        <a href={{ route('comics.create') }} class="btn btn-primary my-2">Aggiungi un nuovo Fumetto</a>

        <table class="table table-striped">

            <table class="table my-5">
                <thead>
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Titolo:</th>
                        <th scope="col">Serie:</th>
                        <th scope="col">Genere:</th>
                        <th scope="col">Data di acquisto:</th>
                        <th scope="col">Prezzo:</th>
                        <th scope="col">D-T-M:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <th scope="row">{{ $comic->id }}</th>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->type }}</td>
                            <td>{{ $comic->sale_date }}</td>
                            <td>{{ $comic->price }}</td>
                            <td>
                                <a href={{ route('comics.show', $comic) }}><i class="fa-solid fa-eye"></i></a>
                                <a href={{ route('comics.edit', $comic) }}><i
                                        class="fa-solid text-warning fa-pen-to-square px-2"></i></a>
                                <!-- Button trigger modal -->
                                <a href="#" type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $comic->id }}">
                                    <i class="fa-solid text-danger fa-trash-can"></i>
                                </a>

                            </td>
                        </tr>
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
                    @endforeach
                </tbody>
            </table>

            {{ $comics->links('pagination::bootstrap-5') }}

            <div class="d-flex flex-column">
                <h5>*Leggenda D-T-M</h5>
                <span>Mostra i dettagli del fumetto: <i class="fa-solid text-primary fa-eye"></i></span>
                <span>Modifica un fumetto: <i class="fa-solid text-warning fa-pen-to-square px-2"></i></span>
                <span>Elimina un fumetto: <i class="fa-solid text-danger fa-trash-can"></i></span>

            </div>

    </section>
@endsection
