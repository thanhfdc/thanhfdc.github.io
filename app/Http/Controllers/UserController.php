<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
      $users = User::latest()->paginate(5);
      return view('admin.user.index',compact('users'));
    }
    public function create()
    {
      $roles = Role::get();
      return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request)
    { 
        dd($request->all());
    //    $user = User::create([
    //     'name'=>$request->name,
    //     'email'=>$request->email,
    //     'password'=>bcrypt($request->password),
    //   ]);
      
    //   $user->roles()->attach($request->role_id);
      
    //   return redirect()->route('users.index');
    }
    public function edit($id)
    {
      $user = User::find($id);
      $roles = Role::all();
      $roleUser = $user->roles;
      return view('admin.user.edit',compact('user','roleUser','roles'));
    }
    public function update(Request $request,$id)
    {
     User::find($id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
      ]);
      $user = User::find($id);
      $user->roles()->sync($request->role_id);
      
      return redirect()->route('users.index');
    }
    public function delete($id)
    {
      User::find($id)->delete();
      return redirect()->route('users.index');
    }
}
