<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(Request $request) {
        $data = $this->validateRequest();

        $book = Book::create($data);
        return redirect($book->path());
    }

    public function update(Request $request, Book $book) {
        $data = $this->validateRequest();

        $book->update($data);

        return redirect($book->path());
    }

    public function delete(Request $request, Book $book) {
        $book->delete();

        return redirect('/books');
    }

    public function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
