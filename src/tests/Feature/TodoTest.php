<?php

namespace Tests\Feature;

use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class TodoTest extends TestCase
{

  public function test_index(): void
  {
    $this->get(route('todo.index'))
      ->assertInertia(
        fn (Assert $page) => $page
          ->component('Todo/Index')
          ->has(
            'todos.0',
            fn (Assert $page) => $page
              ->has('id')
              ->has('title')
              ->has('content')
              ->has('created_at')
              ->has('updated_at')
          )
      );
  }

  public function test_show(): void
  {
    $this->get(route('todo.show', 1))
      ->assertInertia(
        fn (Assert $page) => $page
          ->component('Todo/Show')
          ->has(
            'todo',
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
