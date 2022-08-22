<?php

namespace App\Http\Controllers;

use App\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Symfony\Component\Console\Input\Input;

class StatisticalController extends Controller
{
    public function hangCon(Request $request) {
        // tim kiem san pham
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $product = DB::table('tbl_product')
                ->where('product_status', '=', 1)->Where('product_name', 'like', '%'.$search.'%')->orWhere('id', 'like', '%'.$search.'%')->get();
                return view('admin.statistical.hang-con', compact('product'));
            }
        $product = DB::table('tbl_product')->where('product_status', 1)->get();
        return view('admin.statistical.hang-con', compact('product'));
    }
    public function hangHet(Request $request) {
        // tim kiem san pham
        $search = $request->search;
        if($search) {
            Session::put('value', $search);
            $product = DB::table('tbl_product')
            ->where('product_status', '=', 0)->Where('product_name', 'like', '%'.$search.'%')->orWhere('id', 'like', '%'.$search.'%')->get();
            return view('admin.statistical.hang-het', compact('product'));
        }
        $product = DB::table('tbl_product')->where('product_status', 0)->get();
        return view('admin.statistical.hang-het', compact('product'));
    }
    public function hangDaBan(Request $request) {
        // tim kiem đơn hàng
        if($request->isMethod('get')) {
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $orders = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->orderBy('order_day')
                ->where('orders.order_status', 2)->where('tbl_customer.customer_phone', 'like', '%'.$search.'%' )->orWhere('orders.order_id', 'like', '%'.$search.'%')->get();
                return view('admin.statistical.don-hang-da-ban', compact('orders'));
            }
        }
        $orders = DB::table('orders')->where('order_status', '=', 2)->get();
        return view('admin.statistical.don-hang-da-ban', compact('orders'));
    }
    public function chiTietDonHang(Request $request) {
        // lay du lieu 3 table (customer, orders, order_detail)
        $db_join = DB::table('tbl_customer')
        ->join('orders', 'tbl_customer.customer_id', '=', 'orders.customer_id')
        ->where('orders.order_id', $request->order_id)->select('tbl_customer.customer_name', 'tbl_customer.customer_phone', 'tbl_customer.customer_address', 'orders.order_status')->get();
        // lay du lieu table order_details
        $db_order_detail = DB::table('order_details')
        ->where('order_id', $request->order_id)->select('*')->get();
        // lay du lieu ban orders
        $db_order = DB::table('orders')->where('order_id', $request->order_id)->select('*')->get();
        return view('admin.statistical.chi-tiet-don-hang', compact('db_order_detail','db_order', 'db_join'));
    }

 

    public function doanhThu() {
        $tong_dh = DB::table('Orders')
        ->select('order_id')
        ->whereMonth('created_at',date('m'))
        ->where('order_status', 2)
        ->count();
        
        $tong_tien = DB::table('Orders')
        ->whereMonth('created_at',date('m'))
        ->where('order_status', 2)
        ->sum('order_total_price');

        $tong_tien_nam = DB::table('Orders')
        ->whereYear('created_at',date('Y'))
        ->where('order_status', 2)
        ->sum('order_total_price');
        // dd($tong_tien_nam);

        $tong_dt = DB::table('Orders')
        ->where('order_status', 2)
        ->sum('order_total_price');

        $data_Y=Orders::select('order_id','created_at')
        ->where('order_status', 2)
        ->get()
        ->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('Y');
        });
    
        // Biểu đồ
        
        //Tháng
        $data=Orders::select('order_id','created_at')
        ->where('order_status', 2)
        ->get()
        ->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });
 
        $months=[];
        $monthCount=[];
 
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }


    



        return view('admin.statistical.doanh-thu',compact('data','months','monthCount','tong_tien_nam','tong_tien','tong_dh','tong_dt'));
    }
}
