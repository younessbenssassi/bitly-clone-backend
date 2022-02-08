<?php

namespace App\Http\Controllers;
use Input;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        //return TodoResource::collection($todos);
        return Response()->json([
            'status' => true,
            'todos' => TodoResource::collection($todos)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $title = $request->get('title');
        $users_ids = $request->get('users_ids');
        $admins_ids = $request->get('admins_ids');
        Todo::create([
            'title' => $title,
            'users_ids' => $users_ids,
            'admins_ids' => $admins_ids,
            'status' => 0,
        ]);
        $data = Todo::latest()->first();
        return Response()->json([
            'status' => true,
            'todo' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $title = $request->get('title');
        $users_ids = $request->get('users_ids');
        $admins_ids = $request->get('admins_ids');

        $todo = Todo::find($id);
        $todo->title = $title;
        $todo->users_ids = $users_ids;
        $todo->admins_ids = $admins_ids;
        $todo->update();
        return Response()->json([
            'status' => true,
            'todo' => $todo
        ]);
    }
    public function markAsDone($id)
    {
        $todo = Todo::find($id);
        $todo->status = 1;
        $todo->update();
        return Response()->json([
            'status' => true,
            'todo' => $todo
        ]);
    }
    public function markAsNotDone($id)
    {
        $todo = Todo::find($id);
        $todo->status = 0;
        $todo->update();
        return Response()->json([
            'status' => true,
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return Response()->json([
            'status' => true,
        ]);
    }
}
