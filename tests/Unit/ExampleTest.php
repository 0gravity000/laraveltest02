<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
      //Given I have two records in the database that are posts,
      //and each one is posted a monthe apart.
      $first = factory(Post::class)->create();
      $second = factory(Post::class)->create([
        'created_at' => \Carbon\Carbon::now()->subMonth()
      ]);

      //When I fetch the archives.
      $posts = Post::archives();

//dd($posts);

      //Then the response should be in the proper format.
      $this->assertEquals([
        [
          "year" => $first->created_at->format('Y'), //2017
          "month" => $first->created_at->format('F'), //"Janary"
          "published" => 1
        ],

        [
          "year" => $second->created_at->format('Y'), //2017
          "month" => $second->created_at->format('F'), //"Janary"
          "published" => 1
        ],

      ], $posts);

      //$this->assertCount(2, $posts);

        //$this->assertTrue(true);
    }
}
