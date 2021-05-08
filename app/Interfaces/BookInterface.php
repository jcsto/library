<?php

namespace App\Interfaces;

use App\Book;
use App\Http\Requests\BookRequest;

interface BookInterface {

    public function store(BookRequest $request);

    public function update(BookRequest $request, Book $book);

    public function delete(Book $book);

}
