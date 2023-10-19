<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Passare i dati non funziona

        $_comics = config("comics");

        foreach ($_comics as $_comic) {



            //$comic->title = $_comic['title'];
            // $comic->description = $_comic['description'];
            // $comic->thumb = $_comic['thumb'];
            // $comic->price = $_comic['price'];
            //$comic->series = $_comic['series'];
            // $comic->sale_date = $_comic['sale_date'];
            // $comic->type = $_comic['type'];


            //fare unset per eliminare i 2 arrey, oppure scrivere tutto a mano

            unset($_comic['artists']);
            unset($_comic['writers']);

            $comic = new Comic();

            $comic->fill($_comic);

            $comic->save();
        }
    }
}