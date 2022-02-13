<?php

namespace App\Http\Controllers;
use Input;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Models\User;
use App\Models\Admin;
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
        $todo = Todo::create([
            'title' => $request->get('title'),
            'status' => 0,
        ]);
        $todo->users()->attach($request->get('users_ids'));
        $todo->admins()->attach($request->get('admins_ids'));
        return Response()->json([
            'status' => true,
            'todo' => $todo
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
        $todo = Todo::find($id);
        if($todo){
            $todo->title = $request->get('title');
            $todo->users()->sync($request->get('users_ids'),true);
            $todo->admins()->sync($request->get('admins_ids'),true);
            $todo->update();
            return Response()->json([
                'status' => true,
                'todo' => $todo
            ]);
        }else{
            return Response()->json([
                'status' => false,
            ]);
        }

    }
    public function markAsDone($id)
    {
        $todo = Todo::find($id);
        if($todo){
            $todo->status = 1;
            $todo->update();
            return Response()->json([
                'status' => true,
                'todo' => $todo
            ]);
        }else{
            return Response()->json([
                'status' => false,
            ]);
        }

    }
    public function markAsNotDone($id)
    {
        $todo = Todo::find($id);
        if($todo){
            $todo->status = 0;
            $todo->update();
            return Response()->json([
                'status' => true,
                'todo' => $todo
            ]);
        }else{
            return Response()->json([
                'status' => false,
            ]);
        }

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
        if($todo){
            $todo->users()->detach();
            $todo->admins()->detach();
            $todo->delete();
            return Response()->json([
                'status' => true,
            ]);
        }else{
            return Response()->json([
                'status' => false,
            ]);
        }

    }
}
