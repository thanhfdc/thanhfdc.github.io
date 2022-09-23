@extends('layouts.admin')
@section('title')
<title>Trang chu</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/index/index.css')}}">
@endsection

@section('content')

<div class="content-wrapper">
@include('partials.content-header',['name' => 'Role','key'=>'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
           
           @foreach($roles as $role)
              <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>

                <td>
                  <a href="{{route('roles.edit',['id'=>$role->id])}}" class="btn btn-success">edit</a>
                  <a href="{{route('roles.delete',['id'=>$role->id])}}" class="btn btn-danger">delete</a>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
          </div>
          <div class="col-md-12">
        {{$roles->links()}}
          </div>

          
          
        
        </div>
      </div>
    </div>
  </div>
  @endsection