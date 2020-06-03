<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderItem;
use App\BillingInfo;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems=Cart::Content();
        return view('cart',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, $qty)
    {
        $product=Product::find($id);
        Cart::add($id,$product->name,$qty, $product->price );
        Toastr::success('Added to Cart Successfully', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|min:1,'.$request->Product_id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product=Product::where('id','=',$request->Product_id)->first();
        // return $product;
        if ($product->quantity>=$request->qty) {
            $rowId = $id;
            Cart::update($rowId, $request->qty);
            Toastr::success('Cart Updated', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Out Of Stock', 'Failed');
            return redirect()->back(); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rowId = $id;
        Cart::remove($rowId);

        Toastr::success('Item Removed From Cart', 'Success');
        return redirect()->back();
    }
    // public function cartPayment(){
    //     $cartItems=Cart::Content();

    //     foreach ($cartItems as $key => $cartItem) {
    //         $order_item = new OrderItem();
    //         $order_item->name= $cartItem->name;
    //         $order_item->price= $cartItem->price;
    //         $order_item->qty= $cartItem->qty;
    //         $order_item->total= $cartItem->price * $cartItem->qty;
    //         $order_item->save();
    //     }
    //     // Cart::store(Auth::user()->name);
    //     return view('payment_method',compact('cartItems'));
    // }
    public function cartPayment(){
        return view('payment_method');
    }
    public function PaymentMethod(Request $request){
        // return $request;
        $request->session()->put('payment_method',$request->payment_method);
        return redirect('delivery-method');
    }
    
    public function DeliveryMethod(){
        return view('delivery_method');
    }
    
    public function DeliveryMethodSubmit(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
            'zip' => 'required|numeric',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('delivery-method')
                ->withErrors($validator)
                ->withInput();
        }
        // return $request;
        $request->session()->put('first_name',$request->first_name);
        $request->session()->put('last_name',$request->last_name);
        $request->session()->put('phone',$request->phone);
        $request->session()->put('email',$request->email);
        $request->session()->put('zip',$request->zip);
        $request->session()->put('address',$request->address);
        return redirect('confirmation');
    }
    public function Confirmation(){
        $cartItems=Cart::Content();
        return view('confirmation',compact('cartItems'));
    }
    public function CheckoutSuccess(){
        
        $order= new Order;
        $order->user_id= Auth::user()->id;
        $order->total= Cart::priceTotal();
        $order->order_date=  Carbon::now();
        $order->save();
        $cartItems=Cart::Content();
        foreach ($cartItems as $key => $cartItem) {
            $order_item = new OrderItem();
            $order_item->product_id= $cartItem->id;
            $order_item->name= $cartItem->name;
            $order_item->price= $cartItem->price;
            $order_item->qty= $cartItem->qty;
            $order_item->total= $cartItem->price * $cartItem->qty;
            $order_item->order_id= $order->id;
            $order_item->save();
        }
        $first_name = session()->get('first_name');
        $last_name = session()->get('last_name');
        $phone = session()->get('phone');
        $email = session()->get('email');
        $zip = session()->get('zip');
        $address = session()->get('address');

        $biling_info = new BillingInfo();
        $biling_info->first_name=$first_name;
        $biling_info->last_name=$last_name;
        $biling_info->phone=$phone;
        $biling_info->email=$email;
        $biling_info->zip=$zip;
        $biling_info->address=$address;
        $biling_info->address=$address;
        $biling_info->order_id= $order->id;
        $biling_info->save();

        $first_name = session()->forget('first_name');
        $last_name = session()->forget('last_name');
        $phone = session()->forget('phone');
        $email = session()->forget('email');
        $zip = session()->forget('zip');
        $address = session()->forget('address');

        Cart::destroy();
        Toastr::success('Order Confirmed', 'Success');
        return view('checkout_success');
        
    }
}