<?php

namespace App\Http\Controllers;

use App\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\DataAnalytics;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Symfony\Component\Console\Input\Input;

class StatisticalController extends Controller
{
//thong ke hang het
    public function hangCon(Request $request)
    {
        // tim kiem san pham
        $search = $request->search;
        if ($search) {
            Session::put('value', $search);
            $product = DB::table('tbl_product')
                ->where('product_status', '=', 1)->Where('product_name', 'like', '%' . $search . '%')->orWhere('id', 'like', '%' . $search . '%')->get();
            return view('admin.statistical.hang-con', compact('product'));
        }
        $product = DB::table('tbl_product')->where('product_status', 1)->get();
        return view('admin.statistical.hang-con', compact('product'));
    }
//thong ke hang con
    public function hangHet(Request $request)
    {
        // tim kiem san pham
        $search = $request->search;
        if ($search) {
            Session::put('value', $search);
            $product = DB::table('tbl_product')
                ->where('product_status', '=', 0)->Where('product_name', 'like', '%' . $search . '%')->orWhere('id', 'like', '%' . $search . '%')->get();
            return view('admin.statistical.hang-het', compact('product'));
        }
        $product = DB::table('tbl_product')->where('product_status', 0)->get();
        return view('admin.statistical.hang-het', compact('product'));
    }
//Thống kê sp bán nhiều nhất
    public function thongKeSanPhamBanNhieuNhat(Request $request)
    {
        $db_statistical_order_detail =DB::table('order_details')
            ->select('order_details.order_qty')->get();
        $db_statistical_product = DB::table('tbl_product')
            ->join('order_details','tbl_product.product_price','=','order_details.order_product_price')
            ->orderBy('order_qty', 'desc')->limit(10)
            ->select('*')
            ->limit(10)
            ->get();
        return view('admin.statistical.thong-ke-san-pham-ban-nhieu-nhat', compact('db_statistical_product','db_statistical_order_detail'));
    }
//Thống kê sp bán ít nhất
    public function thongKeSanPhamBanItNhat(Request $request)
    {
        $db_statistical_product_sell_least = DB::table('tbl_product')
//            ->join('order_details','tbl_product.product_name','!=','order_details.order_product_name')
            ->where('tbl_product.product_name','!=','order_details.order_product_name')
            ->select('*')
            ->limit(10)
            ->get();
        return view('admin.statistical.thong-ke-san-pham-ban-it-nhat', compact('db_statistical_product_sell_least'));
    }

//Chi tiết đơn hàng
    public function chiTietDonHang(Request $request)
    {
        // lay du lieu 3 table (customer, orders, order_detail)
        $db_join = DB::table('tbl_customer')
            ->join('orders', 'tbl_customer.customer_id', '=', 'orders.customer_id')
            ->where('orders.order_id', $request->order_id)->select('tbl_customer.customer_name', 'tbl_customer.customer_phone', 'tbl_customer.customer_address', 'orders.order_status')->get();
        // lay du lieu table order_details
        $db_order_detail = DB::table('order_details')
            ->where('order_id', $request->order_id)->select('*')->get();
        // lay du lieu ban orders
        $db_order = DB::table('orders')
            ->orderBy('order_day')
            ->where('order_id', $request->order_id)->select('*')->get();
        return view('admin.statistical.chi-tiet-don-hang', compact('db_order_detail', 'db_order', 'db_join'));
    }

// Start Thong ke doanh thu
    public function doanhThu()
    {
 //ĐƠN HÀNG
        //tong don hang thang
        $tong_dh = DB::table('Orders')
            ->select('order_id')
            ->whereMonth('created_at', date('m'))
            ->where('order_status', 2)
            ->count();

        //tong don hang nam
        $tong_dh_nam_haihai = DB::table('Orders')
            ->select('order_id')
            ->whereYear('created_at', date('2022'))
            ->where('order_status', 2)
            ->count();
        $tong_dh_nam_haimot = DB::table('Orders')
            ->select('order_id')
            ->whereYear('created_at', date('2021'))
            ->where('order_status', 2)
            ->count();
        $tong_dh_nam_haimuoi = DB::table('Orders')
            ->select('order_id')
            ->whereYear('created_at', date('2020'))
            ->where('order_status', 2)
            ->count();

        //tong cong don hang tat ca nam
        $tong_dh_all = DB::table('Orders')
            ->select('order_id')
            ->where('order_status', 2)
            ->count();

 //TIỀN
        //tong tien thang
        $tong_tien = DB::table('Orders')
            ->whereMonth('created_at', date('m'))
            ->where('order_status', 2)
            ->sum('order_total_price');

        //tong tien nam
        $tong_tien_nam_haihai = DB::table('Orders')
            ->whereYear('created_at', date('2022'))
            ->where('order_status', 2)
            ->sum('order_total_price');
        $tong_tien_nam_haimot = DB::table('Orders')
            ->whereYear('created_at', date('2021'))
            ->where('order_status', 2)
            ->sum('order_total_price');
        $tong_tien_nam_haimuoi = DB::table('Orders')
            ->whereYear('created_at', date('2020'))
            ->where('order_status', 2)
            ->sum('order_total_price');

        //tong cong doanh thu tat ca nam
        $tong_dt = DB::table('Orders')
            ->where('order_status', 2)
            ->sum('order_total_price');

        


        
        return view('admin.statistical.doanh-thu', compact('tong_tien_nam_haihai','tong_tien_nam_haimot','tong_tien_nam_haimuoi', 'tong_tien', 'tong_dh','tong_dh_nam_haimuoi','tong_dh_nam_haimot','tong_dh_nam_haihai','tong_dh_all', 'tong_dt'));
    }
    public function fetchData() {
       
     $data = Orders::select(DB::raw('order_status , COUNT(*) as count_order_status'))
        ->groupBy('order_status')
        ->get();

        $status = [
            'Đang xử lý',
            'Đã giao',
            'Đang giao',
            'Thu hồi'
        ];
        
        foreach($data->toArray() as $row)
        {
         $output[] = array(
            'name' => $status[$row['order_status']],
           'order_status' => $row['count_order_status']
         );
        }
        echo json_encode($output);
    }

    public function DoanhThuThang(){
        $totals = [];
        for($i = 1; $i <= 12; $i++){
            if($i < 10){
                $thang = DB::table('Orders')
                -> where('created_at', 'like', '%2022-0'.$i.'%')
                -> sum('order_total_price');
            }else{
                $thang = DB::table('Orders')
                -> where('created_at', 'like', '%2022-'.$i.'%')
                -> sum('order_total_price');
            }
            $totals[] = $thang;
        }

        $status = [
            'T1',
            'T2',
            'T3',
            'T4',
            'T5',
            'T6',
            'T7',
            'T8',
            'T9',
            'T10',
            'T11',
            'T12'
        ];
        
        for($i = 0; $i < 12; $i++){
         $output[] = array(
            'label' => $status[$i],
            'amount' => (int) $totals[$i]
         );
        }
        echo json_encode($output);

    }
}
