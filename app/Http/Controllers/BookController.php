<?php
namespace App\Http\Controllers;
use App\Author;
use App\Book;
use App\Genre;
use App\Http\Requests\StoreBook;


use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show list of all books
    public function index()
    {

        $items = Book::orderBy('name', 'asc')->get();

        return view('book.list', [
            'title' => 'Books',
            'items' => $items
        ]);

    }
    public function create()
    {
        return view('book.form', [
            'title' => 'Add book',
            'authors' => Author::orderBy('name', 'asc')->get(),
            'genres' => Genre::orderBy('name', 'asc')->get(),
            'book' => new Book()
        ]);
    }
    public function store(StoreBook $request)
    {
        $book = new Book();
        $this->saveBookData($book, $request);
        return redirect('/books');
    }


    public function edit(Book $book)
    {
        return view('book.form', [
            'title' => 'Edit book',
            'authors' => Author::orderBy('name', 'asc')->get(),
            'genres' => Genre::orderBy('name', 'asc')->get(),
            'book' => $book
        ]);
    }
    public function update(Book $book, StoreBook $request)
    {
        $this->saveBookData($book, $request);

        return redirect('/books');
    }


    public function delete(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }
    private function uploadBookFile($request)
    {
        // @todo http://image.intervention.io/
        $uploadedFile = $request->file('image');
        $extension = $uploadedFile->clientExtension();
        $name = uniqid();
        return $uploadedFile->storeAs('books', $name . '.' . $extension);
    }

    private function saveBookData($book, $request)
    {
        $validated = $request->validated();

        $book->fill($validated);
        $book->display = (bool) ($validated['display'] ?? false);

        if ($request->has('image')) {
            $book->image = $this->uploadBookFile($request);
        }

        $book->save();
    }






}
