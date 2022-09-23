@extends('layouts.admin')
@section('title')
<title>Menu add</title>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Role','key'=>'Add'  ])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
                <label >Tên Role</label>
                <input type="text" name="name" class="form-control " 
                placeholder="Nhâp tên "
                
                >
            </div>

            </div>
           
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
        </div>
      </div>
    </div>
  </div>
  @endsection