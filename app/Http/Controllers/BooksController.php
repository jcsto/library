<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(Request $request) {
        $data = $this->validateRequest();

        Book::create($data);
    }

    public function update(Request $request, Book $book) {
        $data = $this->validateRequest();

        $book->update($data);
    }

    public function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
