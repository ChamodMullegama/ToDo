<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;

class TodoController extends ParentController
{


    public function index(){
        $response['tasks']=TodoFacade::all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request){

        TodoFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($task_id)
    {
        ToDoFacade::delete($task_id);
        return redirect()->back();
    }

    public function status($task_id){

        ToDoFacade::status($task_id);
        return redirect()->back();
    }
}
