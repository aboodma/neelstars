<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomerController extends Controller
{
   public function profile()
   {
       return view('website.customer.profile');
   }

   public function orders()
   {
       $user = auth()->user();
       $orders = $user->orders;
       return view('website.customer.orders',compact('orders'));
   }
   public function OrderTracking($id)
   {
    $order_id =  Crypt::decrypt($id);
    $order = Order::find($order_id);
    return view('website.customer.order_tracking',compact('order'));
   }

   public function videos()
   {
    $user = auth()->user();
    $orders = $user->orders->where('status',2);
    return view('website.customer.videos',compact('orders'));
   
   }

   public function UpdatePrfoile(Request $request)
   {
       $user  = auth()->user();
       $user->name = $request->name;
       if($request->password != null){
        $user->password = Hash::make($request->password);
       }
       $user->save();
   }
    public function premium_form()
    {
        return view('website.customer.premium');
    }
    public function premium_activate(Request $request)
    {
        $user = auth()->user();
        $user->is_premium = true;
        $user->premium_start_date = Carbon::now()->toDateTimeString();
        $user->save();
        return redirect()->route('customer_dashboard');
    }
}
