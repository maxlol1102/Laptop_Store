<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')) {
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $Product = DB::table('tbl_product')->where('product_name', 'like', '%'.$search.'%')->get();
                Session::put('noti', 'Tìm thấy ');
                return view('pages.home',compact('Product'));
            }
        }
 //sắp xếp giá
        if($request->asc_desc) {
            $selected = $request->asc_desc;
            switch($selected) {
                case 'asc': //sắp xếp tăng dần
                    $Product = DB::table('tbl_product')
                        ->orderBy('product_price', 'asc')->get();
                    return view('pages.home',compact('Product'));
                    break;
                case 'desc': //sắp xếp giảm dần
                    $Product = DB::table('tbl_product')
                        ->orderBy('product_price', 'desc')->get();
                    return view('pages.home',compact('Product'));
                    break;
                default:
                    //gọi hàm paginate trên một query, 10 là số items muốn hiển thị trên từng page.
                    $Product = DB::table('tbl_product')->paginate(10);// lay ra all du lieu
                    return view('pages.home',compact('Product'));
                    break;
            }
        }
 //sắp xếp sl
        if($request->asc_desc_sl) {
            $selected = $request->asc_desc_sl;
            switch($selected) {
                case 'asc': //sắp xếp tăng dần
                    $Product = DB::table('tbl_product')
                        ->orderBy('product_quanity', 'asc')->get();
                    return view('pages.home',compact('Product'));
                    break;
                case 'desc': //sắp xếp giảm dần
                    $Product = DB::table('tbl_product')
                        ->orderBy('product_quanity', 'desc')->get();
                    return view('pages.home',compact('Product'));
                    break;
                default:
                    //gọi hàm paginate trên một query, 10 là số items muốn hiển thị trên từng page.
                    $Product = DB::table('tbl_product')->paginate(10);// lay ra all du lieu
                    return view('pages.home',compact('Product'));
                    break;
            }
        }
        //Hàm links sẽ render các link cho tới hết các trang trong tập kết quả.
        Session::put('paginate', '{!! $all_product->links() !!}'); //Hiển thị kq phân trang
        $Product = DB::table('tbl_product')->paginate(9);
        return view('pages.home',compact('Product'));
    }
    public function index1(){
        return view('pages.contacts');
    }
    public function recruit(){
        return view('layout_recruit');
    }
    public function recentPosts(){
        return view('layout_recentPosts');
    }
}
