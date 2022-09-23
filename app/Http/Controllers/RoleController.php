<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function index()
  {
    $roles = Role::latest()->paginate(5);
    return view('admin.role.index',compact('roles'));
  }
  public function create()
  {
    $roles = Role::get();
    return view('admin.role.add',compact('roles'));
  }
  public function store(Request $request)
  {
     Role::create([
      'name'=>$request->name,
    ]);
    return redirect()->route('roles.index');
  }
  public function edit($id)
  {
    $role = Role::find($id);
    return view('admin.role.edit',compact('role'));
  }
  public function delete($id)
  {
    Role::find($id)->delete();
    return redirect()->route('users.index');
  }
}
