<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use App\Author;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        $this->post('/authors', [
            'name' => 'Author name',
            'dob' => '05/14/1989',
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1989/14/05', $author->first()->dob->format('Y/d/m'));
    }

    /*public function testUpdateAuthor() {
        $author = factory(Author::class)->create();
        $response = $this->post('/authors/' . $author->id, [
            'name' => 'Lola'
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => 'Success']);
        $response->assertJson(['name' => 'Lola']);
    }*/

}
