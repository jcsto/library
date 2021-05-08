<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    public function data() {
        return [
            'title' => 'Cool book title',
            'author_id' => 'Victor'
        ];
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_book_can_be_added_to_a_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', $this->data());

        $book = Book::first();

        $this->assertCount(1, Book::all());
        $response->assertRedirect($book->path());
    }

    public function test_a_title_is_required() {
//        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => '',
            'author_id' => 'Victor'
        ]);

        $response->assertSessionHasErrors('title');

    }

    public function test_a_author_is_required() {
//        $this->withoutExceptionHandling();

        $response = $this->post('/books', array_merge($this->data(), ['author_id' => '']));

        $response->assertSessionHasErrors('author_id');

    }

    /** @test */
    public function a_book_can_be_updated() {

        $this->withoutExceptionHandling();

        $this->post('/books', $this->data());

        $book = Book::first();

        $response = $this->patch($book->path(), $this->data());

        $this->assertEquals('Cool book title', Book::first()->title);
        $this->assertEquals(1, Book::first()->author_id);
        $response->assertRedirect($book->fresh()->path());
    }

    /** @test */
    public function a_book_can_be_deleted() {
        $this->withoutExceptionHandling();

        $this->post('/books',$this->data());

        $book = Book::first();
        $this->assertCount(1, Book::all());

        $response = $this->delete($book->path());

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');
    }

    /** @test */
    public function a_new_author_is_automatically_added() {
        $this->post('/books', $this->data());

        $book = Book::first();
        $author = Author::first();

        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());
    }

    public function testStoreBookRegular() {
        $this->withoutExceptionHandling();

        $this->post('/books2', [
            'title' => 'Llala',
            'author_id' => 'asf'
        ]);

        $this->assertCount(1, Book::all());
    }

}
