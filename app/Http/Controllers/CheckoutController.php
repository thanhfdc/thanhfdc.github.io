<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
   public function login_checkout(){
       return view('checkout.logincheckout');
   }
  
   public function add_customer(Request $request){
       $data = array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['password']=md5($request->password);
       $data['phone']=$request->phone;
       $customer_id = DB::table('customers')->insertGetId($data);
       Session::put('customer_id',$customer_id);
       Session::put('name',$request->name);
        return redirect('/checkout');
   }
   public function checkout(){
  
     return view('checkout.checkout');
      
   }
   public function save_checkout_customer(Request $request){
    $data = array();
    $data['name']=$request->shipping_name;
    $data['note']=$request->shipping_note;
    $data['email']=$request->shipping_email;
    $data['phone']=$request->shipping_phone;
    $data['address']=$request->shipping_address;
    $data['customer_id']=$request->customer_id;

    $shipping_id = DB::table('shippings')->insertGetId($data);
    Session::put('shipping_id',$shipping_id);
    return redirect('/checkout')->with('success','Các thông tin của bạn đã được ghi lại, vui lòng xem lại giỏ hàng bên dưới và thanh toán');

   }
   public function logout_checkout(){
       Session::flush();
         return redirect('/login_checkout');
   }
   public function payment(){
   
      return view('/payment');
}
public function order_place(Request $request){
    $data = array();
    $data['payment_method']=$request->payment_option;
    $data['payment_status']='Đang chờ xử lý';
    $payment_id = DB::table('payments')->insertGetId($data);

    $order_data = array();
    $order_data['customer_id']=Session::get('customer_id');
    $order_data['shipping_id']=Session::get('shipping_id');
    $order_data['payment_id']=$payment_id;
    $order_data['order_total']=Cart::priceTotal();
    $order_data['order_status']='Đang chờ xử lý';
    $order_id = DB::table('orders')->insertGetId($order_data);
    $content=Cart::content();
    foreach($content as $v_content){
    $order_details = array();
    $order_details['order_id'] =  $order_id;
    $order_details['product_id'] = $v_content->id;
    $order_details['product_name'] = $v_content->name;
    $order_details['product_price'] = $v_content->price;
    $order_details['product_sales_quantity']=$v_content->qty;
    DB::table('order_details')->insert($order_details);
    }
   if( $data['payment_method']=='Thẻ ATM')
   echo "thẻ ATM";
   else Echo "Tiền mặt";

}
   public function login_customer(Request $request){
        $email = $request->email_account;
        $pwd = md5($request->pwd_account);   
         
        $result = DB::table('customers')->where('email',$email)->where('password',$pwd)->first();   
        if($result){
          Session::put('customer_id', $result->customer_id);
          Session::put('name',$result->name);
          return Redirect('/checkout');
        }
        else{
          return Redirect('/login_checkout');
        }
       
     
   }
   public function manage_order(){
     $all_order = DB::table('orders')
     ->join('customers','orders.customer_id','=','customers.customer_id')
     ->select('orders.*','customers.name')->paginate(7);
    $manage_order = view('admin.order.manage_order',compact('all_order'));
     return view('admin.order.manage_order',compact('all_order'));
   }

   public function view_order($id){
    $order_by_id = DB::table('orders')
    ->join('customers','orders.customer_id','=','customers.customer_id') 
    ->join('shippings','orders.shipping_id','=','shippings.shipping_id')    
    ->join('order_details','orders.order_id','=','order_details.order_id') 
    ->select('orders.*','order_details.*','customers.*','shippings.*')->where('orders.order_id', $id) ->get();
   
   $manage_order = view('admin.order.view_order',compact('order_by_id'));
     return view('admin.order.view_order',compact('order_by_id'));

   }
 
}
