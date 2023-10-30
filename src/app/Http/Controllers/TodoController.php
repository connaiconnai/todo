<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use App\Http\Resources\TodoResource;
use App\UseCase\Todo\StoreAction;
use Exception;

class TodoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Inertia::render('Todo/Index', [
      'laravelVersion' => Application::VERSION,
      'phpVersion' => PHP_VERSION,
      'todos' => TodoResource::collection(Todo::all())->collection
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreTodoRequest $request, StoreAction $action)
  {
    $todo = $request->makePost();
    try {
      $action($todo);
      return to_route('todo.index');
    } catch (Exception $e) {
      return [
        'message' => $e->getMessage()
      ];
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Todo $todo)
  {
    return Inertia::render('Todo/Show', [
      'todo' => new TodoResource($todo)
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Todo $todo)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTodoRequest $request, Todo $todo)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Todo $todo)
  {
    //
  }
}
