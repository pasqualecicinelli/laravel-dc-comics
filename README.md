<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Init project

1. Installa le dipendenze di frontend

```
npm install
```

2. Fai partire il compilatore per i file di frontend

```
npm run dev
```

3. Installa le dipendenze di backend in un nuovo terminale

```
composer install
```

4. Fai partire il server di sviluppo backend

```
php artisan serve
```

5. Copia il file `.env.example` e chiamalo `.env`. Poi esegui il comando per generare la chiave

```
php artisan key:generate
```

## Connessione al DB

1. Avvio MAMP

2. Apro [PHPMyAdmin](http://localhost/phpMyAdmin/?lang=en)

3. Creo un nuovo DB (es. `db-comics`)

4. nel file `.env` aggiungo i parametri di connessione presenti sulla [pagina iniziale di MAMP](http://localhost/MAMP/)

```
APP_NAME="Laravel DC Comics"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=comics
DB_USERNAME=root
DB_PASSWORD=root
```

## Creazione di una Migration

Per creare una tabella lanciare il comando

```
php artisan make:migration create_houses_table
```

Aggiungi poi tutte le colonne che rappresentano la tabella nella funzione `up()`. I tipi di dato disponibili sono [qui](https://laravel.com/docs/9.x/migrations#available-column-types)

```php
// create_comics_table

public function up()
  {
   Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('description')->nullable();
            $table->text('thumb');
            $table->float('price', 4, 2);
            $table->string('series', 50);
            $table->string('sale_date', 11);
            $table->string('type');
      $table->timestamps();
    });
  }
```

Eseguo la migrazione appena creata con il comando

```
php artisan migrate
```

## Aggiunta di dati

Aggiungo un paio di righe da [PHPMyAdmin](http://localhost/phpMyAdmin/?lang=en) per visualizzare dati di esempio

## Creazione di un Model

Creo un Model che rappresenti la tabella appena realizzata con il comando

```
php artisan make:model Comic
```

## Creazione di un Controller per la risorsa

Creo un Controller per la risorsa `Comic` con il comando

```
php artisan make:controller ComicController
```

Importo il controller nel file `routes/web.php` per assegnargli delle rotte

```php
// web.php

use App\Http\Controllers\ComicController;

// # Rotte home
Route::get('/', [PageController::class, 'index'])->name('home');

// # Rotte risorsa comic
Route::get('/comics', [ComicController::class, 'index'])->name('comic.index');
```

Realizzo una funzione contenente la logica del metodo legato in `routes/web.php` dentro il controller `ComicController.php`. Dovremo

1. importare il modello `Comic`
2. nel metodo `index()` recuperare tutte gli elementi della tabella e passarli ad una vista

```php
// ComicController.php

use App\Models\Comic;

// ...

class ComicController extends Controller
{
  public function index()
  {
    //Stampa tutti gli elementi all'inizio, metodo statico
    //$comic = Comic::all();


    /*
    Oppure si può usare il paginate ho una lista di 12 elementi
    quindi 4 per ogni pagina aggiungi nell'index {{ $comics->links 'pagination::bootstrap-5') }}
    */

    $comics = Comic::paginate(4);
    return view('comics.index', compact('comics'));
  }
}
```

## Creazione di una vista per visualizzare i dati

creo un file `resources\views\comics\index.blade.php` e estendo il layout `app.blade.php`.
In un forelse stamperò tutti i dati ricevuti

```php
@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">

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
                            <td>${{ $comic->price }}</td>
                            <td style="min-width: 100px">
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
                      </tbody>
                    </table>
  </section>
@endsection

```
