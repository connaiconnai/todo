<?php

namespace App\UseCase\Todo;

use Exception;

use App\Models\Todo;

class StoreAction
{
  public function __invoke(Todo $todo): Todo
  {
    assert(!$todo->exists);

    $userPostsCountToday = 30;
    if ($userPostsCountToday >= 20) {
      throw new Exception('limited post');
    }

    $todo->save();
    return $todo;
  }
}
