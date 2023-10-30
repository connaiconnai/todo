<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\TodoController;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class TodoTest extends TestCase
{
  /**
   * @test
   */
  public function test_can_view_todos(): void
  {
    $this->get(route('todo.index'))
      ->assertInertia(
        fn (Assert $page) => $page
          ->component('Todo')
          ->has(
            'todos.data.0',
            fn (Assert $page) => $page
              ->has('id')
              ->has('title')
              ->has('content')
              ->has('created_at')
              ->has('updated_at')
          )
      );
  }
}
