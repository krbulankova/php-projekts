<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Genre;
use App\Http\Requests\StoreGenre;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $items = Genre::orderBy('name', 'asc')->get();

        return view('genre.list', [
            'title' => 'Genre',
            'items' => $items
        ]);

    }
    public function create()
    {
        return view('genre.form', [
                'title' => 'Add genre',
                'genre' => new Genre()
        ]);
    }
    public function store(StoreGenre $request)
    {
        $genre = new Genre();
        $this->saveGenreData($genre, $request);
        return redirect('/genre');
    }
    private function saveGenreData($genre, $request)
    {
        $validated = $request->validated();
        $genre->name = $validated['name'];
        $genre->display = (bool) ($validated['display'] ?? false);
        $genre->save();
    }
    public function edit(Genre $genre)
    {

        return view('genre.form', [
            'title' => 'Edit genre',
            'genre' => $genre
        ]);
    }

    public function update(Genre $genre,StoreGenre $request)
    {

        $this->saveGenreData($genre, $request);
        return redirect('/genre');
    }

    public function delete(Genre $genre)
    {
        $genre->delete();
        return redirect('/genre');
    }

}
