<?php

use Illuminate\Support\Facades\Route;

//sử dụng prefix để URL khi định nghĩa route ngắn gọn dễ nhìn hơn
//frontend
    Route::get('/','HomeController@index');  //trieu hoi ham homectr va vao ham index
    Route::get('/trang-chu','HomeController@index');
    Route::post('/trang-chu','HomeController@index');
    Route::get('/lien-he','HomeController@index1');
    Route::get('/tuyen-dung','HomeController@recruit');
    Route::get('/bai-viet-gan-day','HomeController@recentPosts');
    Route::get('/detail_product/{product_code}','ProductController@detail_product');
    Route::post('/save-cart','CartController@save_cart');
    Route::get('/show-cart','CartController@show_cart');
    Route::post('/show-cart','CartController@show_cart');
    Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
    Route::post('/update-cart-quantity','CartController@update_cart_quantity');
    //categoryproduct
        Route::get('/category_product/{category_id}','ProductController@category');
//end frontend


//backend
    //admin
        Route::get('/admin-login','AdminController@index');  // trang dang nhap
        Route::get('/dashboard','AdminController@show_dashboard');//quan ly trang
        Route::get('/logout','AdminController@logout');
        Route::post('/admin-dashboard','AdminController@dashboard'); // xu ly su kien dang nhap
        Route::get('/admin-manager', 'AdminController@adminManager');
        Route::get('/edit-admin/{admin_id}', 'AdminController@editAdmin');
        Route::get('/delete-admin/{admin_id}', 'AdminController@deleteAdmin');
        Route::post('/update-admin/{admin_id}', 'AdminController@updateAdmin');
        //categoryproduct
            Route::get('/add-category-product','CategoryProduct@add_category_product');
            Route::get('/all-category-product','CategoryProduct@all_category_product');// _ham thi _sp
            Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
            Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
            Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
            Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
            Route::post('/save-category-product','CategoryProduct@save_category_product');
            Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
        //product
            Route::get('/add-product','Product@add_product');
            Route::get('/all-product','Product@all_product');
            Route::post('/all-product','Product@all_product');
            Route::get('/edit-product/{product_code}','Product@edit_product');
            Route::post('/edit-product/{product_code}','Product@edit_product');
            Route::get('/delete-product/{product_code}','Product@delete_product');
            Route::get('/unactive-product/{product_code}','Product@unactive_product');
            Route::get('/active-product/{product_code}','Product@active_product');
            Route::post('/save-product','Product@save_product');
            Route::post('/update-product/{product_code}','Product@update_product');
            // asc

        //customer
            Route::get('/add-customer','CustomerController@add_customer');
            Route::get('/all-customer','CustomerController@all_customer');// _ham thi _s
            Route::get('/edit-customer/{customer_id}','CustomerController@edit_customer');
            Route::get('/delete-customer/{customer_id}','CustomerController@delete_customer');
            Route::post('/update-customer/{customer_id}','CustomerController@update_customer');
            Route::get('/order-history/{customer_id}', 'CustomerController@orderHistory');
            Route::get('/order-history-detail/{order_id}', 'CustomerController@orderHistoryDetail');
        // order manager
            Route::get('/order-manager', 'CustomerController@orderManager');
            Route::get('/admin-order-manager/{order_id}', 'CustomerController@orderDetailManager');
            Route::get('/verify-order/{order_id}', 'CustomerController@verifyOrder');
            Route::get('/order-manager-verified', 'CustomerController@orderManagerVerified');
            Route::get('/order-manager-successfully', 'CustomerController@orderManagerSuccessfully');
            Route::get('/cancel-order/{order_id}', 'CustomerController@cancelOrder');
            Route::get('/success-order/{order_id}', 'CustomerController@successOrder');
            Route::get('/order-manager-callback', 'CustomerController@orderManagerCallBack');
            Route::get('/order-callback/{order_id}', 'CustomerController@orderCallBack');
        // thong ke
            Route::get('/hang-con', 'StatisticalController@hangCon');
            Route::get('/hang-het', 'StatisticalController@hangHet');
            Route::get('/thong-ke-san-pham', 'StatisticalController@thongKeSanPham');
            Route::get('/chi-tiet-don-hang/{order_id}', 'StatisticalController@chiTietDonHang');
            Route::get('/doanh-thu', 'StatisticalController@doanhThu');


    // end admin

    //customer
        Route::get('/signup','CustomerController@signup');
        Route::get('/signin', 'CustomerController@signin');
        // them tai khoan customer
            Route::post('/add-acc', 'CustomerController@addAcc');
        // dang nhap tai khoan customer
            Route::post('/login', 'CustomerController@login');
        // trang tai khoan cua khach hang
            Route::get('/customer', 'CustomerController@customer');
        // dang xuat
            Route::get('/logout-customer', 'CustomerController@logoutCustomer');
        // luu don dat hang vao csdl
            Route::get('/save-order', 'CustomerController@saveOrder');
        // chi tiet don dat hang
            Route::get('/order-detail/{order_id}', 'CustomerController@orderDetail');
        // huy don dat hang
            Route::get('/delete-order/{order_id}', 'CustomerController@deleteOrder');
        // thong tin khach hang
            Route::get('/info-customer', 'CustomerController@infoCustomer');
        // cap nhat thong tin khach hang
            Route::post('/update-customer', 'CustomerController@update_info_customer');
        // cap nhat mat khau khach hang
            Route::post('/update-pass-customer', 'CustomerController@update_pass_customer');
    // end customer

//end backend

