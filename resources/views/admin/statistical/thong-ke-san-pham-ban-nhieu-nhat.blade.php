@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/thong-ke-san-pham-ban-nhieu-nhat')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Top 10 sản phẩm bán nhiều nhất</b></font><br>
        </form>
        <br>
    </div>
    <div class="table-responsive">
        <div style="text-align: center; background: #ddede0">
            <font style="color: red;font-size:20px">
                <?php
                $message = Session::get('message');
                $mess = Session::get('notiAddCategory');
                if($message || $mess){
                echo $message;
                echo $mess;
                Session::put('message',null);
                Session::put('notiAddCategory',null);
                }
                ?>
            </font>
        </div>
    <table class="table table-striped table-bordered">
        <thead style="background: #ddede0">
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã sản phẩm </th>
            <th style="text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Hình ảnh</th>
            <th style="text-align: center">Gía</th>
            <th style="text-align: center">Lượt bán</th>
        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($db_statistical_product as $item)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{ $item->code}}</td>
            <td style="text-align: center">
                <a href="{{URL::to('/detail_product')}}/{{$item->code}}">{{ $item->product_name }}</a>
            </td>
            <td style="text-align: center"><img style="width: 35px;height: 35px" src="public/backend/img_admin/{{ $item->product_img }}"></td>
            <td style="text-align: center">{{ number_format($item->product_price) }} VND</td>
            <td style="text-align: center">{{$item->order_qty}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
