<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Interfaces\BookInterface;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @var BookInterface
     */
    protected $bookInterface;

    public function __construct(BookInterface $bookInterface) {
        $this->bookInterface = $bookInterface;
    }

    public function store(BookRequest $request) {
        return $this->bookInterface->store($request);
    }

    public function storeRepository() {
        $book = Book::create($this->validateRequest());
        return redirect($book->path());
    }

    public function update(BookRequest $request, Book $book) {
        return $this->bookInterface->update($request, $book);
    }

    public function delete(Book $book) {
        return $this->bookInterface->delete($book);
    }

    public function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'author_id' => 'required',
        ]);
    }
}
