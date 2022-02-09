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
        $user_type = $request->get('user_type');
        $todo = Todo::create([
            'title' => $title,
            'users_ids' => $users_ids,
            'admins_ids' => $admins_ids,
            'user_type' => $user_type,
            'status' => 0,
        ]);
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
        $title = $request->get('title');
        $users_ids = $request->get('users_ids');
        $admins_ids = $request->get('admins_ids');
        $user_type = $request->get('user_type');

        $todo = Todo::find($id);
        if($todo){
            $todo->title = $title;
            $todo->users_ids = $users_ids;
            $todo->admins_ids = $admins_ids;
            $todo->user_type = $user_type;
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
