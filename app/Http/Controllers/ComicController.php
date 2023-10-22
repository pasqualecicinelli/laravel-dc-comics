<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {


        // $comics = Comic::all();

        $comics = Comic::paginate(4);
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();, $comic

        $data = $this->validation($request->all());

        $comic = new Comic();

        $comic->fill($data);

        $comic->save();

        return redirect()->route("comics.show", $comic);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view("comics.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // $data = $request->all();      , $comic->id
        $data = $this->validation($request->all());

        $comic->update($data);

        return redirect()->route("comics.show", $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    /**
     * Valida i dati che l'utente inserisce nella creazione
     * e modifica dei dati.
     *
     * @param  int  $id
     * use Illuminate\Support\Facades\Validator
     */
    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:50',
                'description' => 'string',
                'thumb' => 'required|string',
                'price' => 'required|numeric|between:0,99.99',
                'series' => 'required|string|max:50',
                'sale_date' => 'required|string|max:11',
                'type' => 'required|string',

            ],

            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.string' => 'Il titolo deve essere una stringa',
                'title.max' => 'Titolo troppo lungo massimo 50 caratteri',

                'description.string' => 'La descrizione deve essere una stringa',

                'thumb.required' => 'Il thumb è obbligatorio',
                'thumb.string' => 'La thumb deve essere un URL',

                'price.required' => 'Il prezzo è obbligatorio',
                'price.float' => 'Il prezzo deve essere un numero max di 99,99',

                'series.required' => 'La serie è obbligatoria',
                'series.string' => 'La serie deve essere una stringa',
                'series.max' => 'Serie troppo lunga massimo 50 caratteri',


                'sale_date.required' => 'La data è obbligatoria',
                'sale_date.string' => 'La data deve essere una stringa',
                'sale_date.max' => 'La data deve essere espressa in numeri',

                'type.required' => 'Il genere è obbligatorio',
                'type.string' => 'Il genere deve essere una stringa',
            ]
        )->validate();
        return $validator;
    }
}