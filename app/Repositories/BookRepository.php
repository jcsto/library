<?php

namespace App\Repositories;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Interfaces\BookInterface;

class BookRepository implements BookInterface {

    public function store(BookRequest $request) {
        $book = Book::create($request->all());
        return redirect($book->path());
    }

    public function update(BookRequest $request, Book $book) {
        $book->update($request->all());
        return redirect($book->path());
    }

    public function delete(Book $book) {
        $book->delete();
        return redirect('/books');
    }
}
