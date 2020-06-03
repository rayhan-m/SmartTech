<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function SellReportSearch(){
        return view('admin.sell_report_Search');
    }

    public function SellReport(Request $request){

        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));

        $order_items=  DB::table('order_items')
            ->Join('orders', 'order_items.order_id', '=', 'orders.id')
            ->select('order_items.id','order_items.name','order_items.qty','order_items.price','order_items.total','order_items.created_at','orders.delivery_status')
            ->where('order_items.created_at', '>=', $from_date)
            ->where('order_items.created_at', '<=', $to_date)
            ->where('orders.delivery_status','=',1)->get();

        // $order_items= OrderItem::where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date)->get();
        $grand_total=0;
        foreach ($order_items as $key => $value) {
            $grand_total=$grand_total + $value->total;
        }
        
        return view('admin.sell_report',compact('order_items','grand_total'));
    }
    
    public function ExpenseReportSearch(){

        return view('admin.expense_report_Search');
    }
    public function ExpenseReport(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $data=  DB::table('expenses')
        ->Join('expense_types', 'expenses.type_id', '=', 'expense_types.id')
        ->select('expenses.id','expenses.type_id','expenses.expense_date','expenses.amount','expenses.voucher','expenses.details','expenses.active_status','expense_types.name')
        ->where('expenses.expense_date', '>=', $from_date)
        ->where('expenses.expense_date', '<=', $to_date)
        ->get();

        $grand_total=0;
        foreach ($data as $key => $value) {
            $grand_total=$grand_total + $value->amount;
        }
        return view('admin.expense_report',compact('data','grand_total'));
    }
    public function IncomeSummerySearch(){

        return view('admin.income_summery_Search');
    }
    
    public function IncomeSummery(Request $request){
        // income 
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));

        $order_items=  DB::table('order_items')
            ->Join('orders', 'order_items.order_id', '=', 'orders.id')
            ->select('order_items.id','order_items.name','order_items.qty','order_items.price','order_items.total','order_items.created_at','orders.delivery_status')
            ->where('order_items.created_at', '>=', $from_date)
            ->where('order_items.created_at', '<=', $to_date)
            ->where('orders.delivery_status','=',1)->get();

        $total_income=0;
        foreach ($order_items as $key => $value) {
            $total_income=$total_income + $value->total;
        }
        // expense 
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $data=  DB::table('expenses')
        ->Join('expense_types', 'expenses.type_id', '=', 'expense_types.id')
        ->select('expenses.id','expenses.type_id','expenses.expense_date','expenses.amount','expenses.voucher','expenses.details','expenses.active_status','expense_types.name')
        ->where('expenses.expense_date', '>=', $from_date)
        ->where('expenses.expense_date', '<=', $to_date)
        ->get();

        $total_expenes=0;
        foreach ($data as $key => $value) {
            $total_expenes=$total_expenes + $value->amount;
        }
        $income_summery= $total_income - $total_expenes;
        
        return view('admin.income_summery',compact('total_income','total_expenes','income_summery'));
    }
}