<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Models\User;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TodoController extends ParentController
{

    public function __construct()
    {
     // $this->middleware(['auth','role:admin']);
     // $this->middleware(['auth','can:delete_todo']);
     // $this->middleware(['auth','permission:view_todo']);
     //  $this->middleware(['auth','role_or_permission:view_todo']);
    }

    public function index(){
        $user = Auth::user();
       // dd($user->getRoleNames());
       //dd($user->getPermissionNames());
       //dd($user->getPermissionsViaRoles());


    // role
    //    if($user->hasRole('admin')){
    //        $response['tasks']=TodoFacade::all();
    //        return view('pages.todo.index')->with($response);
    //    }
    //    else{
    //     dd('yo dont have permission');
    //    }


    // permission
    // if($user->hasPermissionTo('view_todo')){
    //   $response['tasks']=TodoFacade::all();
    //   return view('pages.todo.index')->with($response);
    //  }
    //  else
    //  {
    //   dd('yo dont have permission');
    //  }

          //super admin sadaha
     if($user->can('view_todo')){
      $response['tasks']=TodoFacade::all();
       return view('pages.todo.index')->with($response);
      }
      else
      {
       dd('yo dont have permission');
      }





        // $response['tasks']=TodoFacade::all();
        // return view('pages.todo.index')->with($response);
    }

    public function store(Request $request){

        // 1 run
        // $role = Role::create(['name' => 'admin']);
        // $role = Role::create(['name' => 'sub_admin']);
        // $role = Role::create(['name' => 'user']);
        // $role = Role::create(['name' => 'super_admin']);

        // 2 run
        // $permission = Permission::create(['name' => 'view_todo']);
        // $permission = Permission::create(['name' => 'create_todo']);
        // $permission = Permission::create(['name' => 'update_todo']);
        // $permission = Permission::create(['name' => 'delete_todo']);
        // $permission = Permission::create(['name' => 'done_todo']);

        //way of another
        // $admin->givePermissionTo('view_todo');
        // $admin->givePermissionTo('create_todo');
        // $admin->givePermissionTo('update_todo');
        // $admin->givePermissionTo('delete_todo');

        // $sub_admin->givePermissionTo('view_todo');
        // $sub_admin->givePermissionTo('create_todo');
        // $sub_admin->givePermissionTo('update_todo');

        // $user->givePermissionTo('view_todo');

        // 3 run
        // $admin=User::find(1);
        // $sub_admin=User::find(2);
        // $user=User::find(3);
        // $super_admin=User::find(4);

        // $admin->assignRole('admin');
        // $sub_admin->assignRole('sub_admin');
        // $user->assignRole('user');
        // $super_admin->assignRole('super_admin');

        // 4 run
        // $role_admin = Role::where('name', 'admin')->first();
        // $role_sub_admin = Role::where('name','sub_admin')->first();
        // $role_user = Role::where('name', 'user')->first();


        // $role_admin->givePermissionTo('view_todo');
        // $role_admin->givePermissionTo('create_todo');
        // $role_admin->givePermissionTo('update_todo');
        // $role_admin->givePermissionTo('delete_todo');

        // $role_sub_admin->givePermissionTo('view_todo');
        // $role_sub_admin->givePermissionTo('create_todo');
        // $role_sub_admin->givePermissionTo('update_todo');

        // $role_user->givePermissionTo('view_todo');



        $user = Auth::user();
        if($user->can('create_todo')){

            TodoFacade::store($request->all());
            return redirect()->back();
           }
           else
           {
            dd('you do not have permission to create');
           }


        // TodoFacade::store($request->all());
        // return redirect()->back();
    }

    public function delete($task_id)
    {

        $user = Auth::user();
        if($user->can('delete_todo')){
            ToDoFacade::delete($task_id);
            return redirect()->back();
           }
           else
           {
            dd('you do not have permission to delete');
           }

        //    ToDoFacade::delete($task_id);
        //    return redirect()->back();
    }

    public function status($task_id){

        $user = Auth::user();
        if($user->can('done_todo')){
            ToDoFacade::status($task_id);
            return redirect()->back();
           }
           else
           {
            dd('you do not have permission to change status');
           }

        //    ToDoFacade::status($task_id);
        //    return redirect()->back();
    }

    public function edit(Request $request){

        $response['task']=TodoFacade::get($request['task_id']);
        return view('pages.todo.edit')->with($response);
    }

    public function update(Request $request,$task_id){

        $user = Auth::user();
        if($user->can('update_todo')){
            TodoFacade::update($request->all(),$task_id);
            return redirect()->back();
           }
           else
           {
            dd('you do not have permission to update ');
           }



        //    TodoFacade::update($request->all(),$task_id);
        //    return redirect()->back();
    }


    // sub task
    public function sub($task_id){

        $response['task'] = TodoFacade::get($task_id);
        $response['sub_tasks'] = TodoFacade::getSubTasksByTask($task_id);
        return view('pages.todo.sub')->with($response);
    }

    public function subStore(Request $request){

        TodoFacade::subStore($request->all());
        return redirect()->back();
    }


}
