<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function ProductList()
    {
        $data = Product::get();
        $categories = Category::get();
        return view('admin.product_list', compact('data','categories'));
    }

    public function ProductStore(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/product')
                ->withErrors($validator)
                ->withInput();
        }
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_status = $request->product_status;
        $product->feature = $request->feature;
        $product->details = $request->details;
        $image = "";
        if ($request->file('image') != "") {
            $file = $request->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backend/uploads/product/', $image);
            $image = 'backend/uploads/product/' . $image;
            $product->image = $image;
        }
        $product->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('product');
    }

    public function ProductActive($id)
    {
        $product = Product::findOrfail($id);
        $product->active_status = 1;
        $product->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('product');
    }
    public function ProductDeactive($id)
    {
        $product = Product::findOrfail($id);
        $product->active_status = 0;
        $product->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('product');
    }
    public function ProductDelete($id)
    {
        $product = Product::findOrfail($id);
        $product->delete();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('product');
    }
    public function ProductUpdate(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/product')
                ->withErrors($validator)
                ->withInput();
        }
        $product = Product::findOrfail($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_status = $request->product_status;
        $product->feature = $request->feature;
        $product->details = $request->details;
        $image = "";
        if ($request->file('image') != "") {
            $file = $request->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backend/uploads/product/', $image);
            $image = 'backend/uploads/product/' . $image;
            $product->image = $image;
        }
        $product->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('product');
    }


// Stock 

     public function StocktList()
    {
        $product = Product::get();
        // $stocks = Stock::get();
        
        $stocks=  DB::table('stocks')
        ->Join('products', 'stocks.product_id', '=', 'products.id')
        ->select('stocks.id','stocks.product_id','stocks.quantity','stocks.voucher','stocks.active_status','products.name')
        ->get();
        return view('admin.stock_list', compact('product','stocks'));
    }

    public function StockStore(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->quantity = $request->quantity;
        $voucher = "";
        if ($request->file('voucher') != "") {
            $file = $request->file('voucher');
            $voucher = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backend/uploads/voucher/', $voucher);
            $voucher = 'backend/uploads/voucher/' . $voucher;
            $stock->voucher = $voucher;
        }
        $stock->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function StockUpdate(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $stock = Stock::findOrfail($request->id);
        $stock->product_id = $request->product_id;
        $stock->quantity = $request->quantity;
        $voucher = "";
        if ($request->file('voucher') != "") {
            $file = $request->file('voucher');
            $voucher = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backend/uploads/voucher/', $voucher);
            $voucher = 'backend/uploads/voucher/' . $voucher;
            $stock->voucher = $voucher;
        }
        $stock->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }

    public function StockUpdated($id, $product_id, $quantity)
    {
        $stock = Stock::findOrfail($id);
        $stock->active_status = 1;
        $stock->update();
        
        $product = Product::findOrfail($product_id);

        $product->quantity = $product->quantity + $quantity;
        $product->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
}