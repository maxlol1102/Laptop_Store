@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/order-manager')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Đơn hàng đang chờ xử lý</b>&nbsp;&nbsp;&nbsp;&nbsp;</font>
            <input style="vertical-align: top; width: 250px;" name="search" type="text" class="form-control search" placeholder="Nhập SĐT KH hoặc Mã đơn hàng" value="<?php
                $value = Session::get('value');
                if($value) {
                    echo $value;
                    Session::put('value', null);
                }
            ?>">
        </form><br>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <p style="text-align: center; background: #ddede0"><b>Tổng số đơn hàng đang chờ xử lí:
                @foreach ($db_order as $item)
                    <?php
                    $count = count($db_order);
                    ?>
                @endforeach
                <?php
                if($count) {
                    echo "<font color='red'>".$count."</font>";
                }
                ?></b>
        </p>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Tên khách hàng</th>
            <th style="text-align: center">Số điện thoại</th>
            <th style="text-align: center">Mã đơn hàng</th>
            <th style="text-align: center">Ngày đặt hàng</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($db_order as $item)
            <tr>
                <td style="text-align: center">
                    <?php $i++; echo $i; ?>
                </td>
                <td style="text-align: center">{{$item->customer_name}}</td>
                <td style="text-align: center">{{$item->customer_phone}}</td>
                <td style="text-align: center">{{$item->order_id}}</td>
                <td style="text-align: center">{{$item->order_day}}</td>
                <td style="text-align: center">
                    <a href="{{URL::to('/admin-order-manager')}}/{{$item->order_id}}">Chi tiết</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
    <div class="row">
        <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
            <!-- Phân trang -->
            {!! $db_order->links() !!}
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
