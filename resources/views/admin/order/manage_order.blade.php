@extends('layouts.admin')
@section('title')
<title>Quản lý đơn hàng</title>
@endsection
@section('content')

<div class="content-wrapper">
@include('partials.content-header',['name' => 'Quản lý','key'=>'đơn hàng'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Tên người đặt hàng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Tình trạng đơn hàng</th>
                <th scope="col">Xem đơn hàng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($all_order as $key=>$order )
              <tr>
                <th scope="row">{{$order->name}}</th>
                <td>{{$order->order_total}}</td>
                <td> {{$order->order_status}} </td>
                <td> <a href="{{URL::to('/view_order/'.$order->order_id)}}" class="btn btn-success">Chi tiết</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <div class="col-md-12">
          {{$all_order->links('pagination::bootstrap-4')}}
          </div>

          
          
        
        </div>
      </div>
    </div>
  </div>
  @endsection