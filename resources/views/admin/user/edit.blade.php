@extends('layouts.admin')
@section('title')
<title>Menu add</title>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name' => 'user','key'=>'Add'  ])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <form action="{{route('users.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
                <label >Tên user</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                placeholder="Nhâp tên "  value="{{$user->name}}"
                
                >
                @error('name')
                <div class="alert alart-danger">{{$message}}</div>
                @enderror()
            </div>

            <div class="form-group">
                <label >Email</label>
                <input type="Emai;" name="email" class="form-control @error('email') is-invalid @enderror" 
                placeholder="Nhâp mô tả"
                value="{{$user->email}}"
                >
                @error('email')
                <div class="alert alart-danger">{{$message}}</div>

                @enderror()
            </div>

            <div class="form-group">
                <label >Password</label>
                <input type="password" name="password" class="form-control" value="{{$user->password}}"> 
                
            </div>

            <div class="form-group">
              <label for="custom1" class="control-label">Quyền</label>
              
              <select class="custom-select" name="role_id">
                @foreach($roles as $role)
                    
                <option {{$roleUser->contains('id',$role->id) ? 'selected' : ''}} value="{{$role->id}}"> {{$role->name}}</option>
                
                @endforeach
              </select>
            </div>

           
            </div>
           
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
        </div>
      </div>
    </div>
  </div>
  @endsection