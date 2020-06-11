<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookServiceController extends Controller
{
    // Return 3 random books
    public function getTopBooks()
    {
        $books = Book::where(
            'display', true
        )
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $books;
    }
// Return selected book
    public function getBook(Book $book)
    {
        $checkedBook = Book::where([
            'id' => $book->id,
            'display' => true,
        ])
            ->firstOrFail();
        return $checkedBook;
    }
// Return 3 random books except selected
    public function getRelated(Book $book)
    {
        $books = Book::where([
            ['display', true],
            ['id', '<>', $book->id]
        ])
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $books;
        }
}
