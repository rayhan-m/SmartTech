<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Expense;
Use \Carbon\Carbon;
use App\Payment;
use App\Product;
use App\OrderItem;
use App\BillingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BackEndController extends Controller
{
    public function Dashboard(){
        // $total_user = 0;
        $total_user = User::where('role_id',2)->get()->count();
        $users = User::where('role_id',2)->latest()->take(5)->get();
        // $total_product = 0;
        $products = Product::where('active_status',1)->latest()->take(10)->get();
        // $total_order =0;
        $total_order = Order::all()->count();

        $order_items=  DB::table('order_items')
            ->Join('orders', 'order_items.order_id', '=', 'orders.id')
            ->select('order_items.id','order_items.name','order_items.qty','order_items.price','order_items.total','order_items.created_at','orders.delivery_status')
            ->where('orders.delivery_status','=',1)->get();

        // $order_items= OrderItem::where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date)->get();
        $total_sell=0;
        foreach ($order_items as $key => $value) {
            $total_sell=$total_sell + $value->total;
        }

        $data=  DB::table('expenses')
        ->Join('expense_types', 'expenses.type_id', '=', 'expense_types.id')
        ->select('expenses.id','expenses.type_id','expenses.expense_date','expenses.amount','expenses.voucher','expenses.details','expenses.active_status','expense_types.name')
        ->where('expenses.active_status',1)
        ->get();

        $total_expense=0;
        foreach ($data as $key => $value) {
            $total_expense=$total_expense + $value->amount;
        }

        return view('admin.dashboard',compact('total_user','total_order','products','users','total_sell','total_expense'));
    }
    public function AllOrders(){
       $orders=  DB::table('orders')
        ->Join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.id','orders.total','orders.delivery_status', 'users.name')
        ->get();
        return view('admin.all_orders',compact('orders'));
    }
    public function PendingOrders(){
       $orders=  DB::table('orders')
        ->Join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.id','orders.total','orders.delivery_status', 'users.name')
        ->where('delivery_status','=',0)
        ->get();
        return view('admin.pending_orders',compact('orders'));
    }
    public function DeliveredOrders(){
       $orders=  DB::table('orders')
        ->Join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.id','orders.total','orders.delivery_status', 'users.name')
        ->where('delivery_status','=',1)
        ->get();
        return view('admin.delivered_orders',compact('orders'));
    }

    public function DeliveryActive($id)
    {
        $payment= Payment::where('order_id','=',$id)->first();
        if (isset($payment) && $payment->payment_status==1) {
            $delivery = Order::findOrfail($id);
            $delivery->delivery_status = 1;
            $delivery->update();

            $order_items=OrderItem::where('order_id','=',$id)->get();
            // dd($order_items);
            // return  $order_items;
            foreach ($order_items as $key => $order_item) {
                $product=Product::where('id','=',$order_item->Product_id)->first();
                // return  $product;
                $p_qty=$product->quantity;
                
                $product->quantity= $p_qty - $order_item->qty;
                $product->update();
            }
            
            Toastr::success('Operation successful', 'Success');
            return redirect()->route('all_orders');
        } else {
            Toastr::error('Please Complete Payment', 'Failed');
            return redirect()->back(); 
        }
        

        
    }
    public function DeliveryDeactive($id)
    {
        $delivery = Order::findOrfail($id);
        $delivery->delivery_status = 0;
        $delivery->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('all_orders');
    }

    public function Payment(){
        $payments=Payment::all();
        $orders=Order::all();
        return view('admin.payment',compact('payments','orders','unpaid_orders'));
    }

    public function PaymentStore(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'payment_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->payment_status ==1 ) {
            $order=Order::findorfail($request->order_id);
            $order->active_status=1;
            $order->update();
        }
        $payment = new Payment();
        $payment->order_id = $request->order_id;
        $payment->pay_amount = $request->pay_amount;
        $payment->payment_date = Carbon::now();
        if ( $request->payment_status ==1) {
            $payment->payment_status = $request->payment_status;
            $order = Order::where('id','=',$payment->order_id )->first();
            $order->active_status=1;
            $order->update();
        } else {
            $payment->payment_status = $request->payment_status;
        }
        // return $payment;
        $payment->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('payment');
    }
    public function PaymentDelete($id)
    {
        // return $id;
        $payment = Payment::findOrfail($id);
        $payment->delete();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('payment');
    }

    public function PaymentActive($id)
    {
        $payment = Payment::findOrfail($id);
        $payment->payment_status = 1;
        $payment->update();

        $order = Order::where('id','=',$payment->order_id )->first();
        $order->active_status=1;
        $order->update();

        Toastr::success('Operation successful', 'Success');
        return redirect()->route('payment');
    }
    public function PaymentDeactive($id)
    {
        $payment = Payment::findOrfail($id);
        $payment->payment_status = 0;
        $payment->update();

        $order = Order::where('id','=',$payment->order_id )->first();
        $order->active_status=0;
        $order->update();

        Toastr::success('Operation successful', 'Success');
        return redirect()->route('payment');
    }

    public function Invoice($id){
        $orders = Order::findorfail($id);
        $billing_info = BillingInfo::where('order_id','=',$id)->first();
        $order_items= OrderItem::where('order_id','=',$id)->get();
        return view('admin.invoice',compact('orders','billing_info','order_items'));
    }

    public function PaymentCreate(){
        // $orders=Order::all();
        $unpaid_orders=Order::where('active_status', '=', 0)->get();
        return view('admin.payment_create',compact('unpaid_orders'));
    }
    public function OrderInfo(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $order=Order::where('id','=',$request->order_id)->first();
        $unpaid_orders=Order::where('active_status', '=', 0)->get();
        return view('admin.payment_create',compact('order','unpaid_orders'));
    }
}