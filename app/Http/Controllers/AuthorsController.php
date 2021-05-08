<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function store() {
        Author::create(\request()->only([
            'name', 'dob'
        ]));
    }

    public function update(Author $author) {
        $author->name = request()->get('name');
        $author->save();
        return response()->json(['status' => true, 'message' => 'Success', 'name' => $author->name], 200);
    }
}
