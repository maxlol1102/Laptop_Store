@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; padding-top: 15px; widows: 100%;">
        <form action="{{URL::to('/thong-ke-san-pham-ban-it-nhat')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Top sản phẩm bán ít nhất</b></font><br>
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
            </tr>
            </thead>
            <tbody><?php $i = 0; ?>
            @foreach($db_statistical_product_sell_least as $item)
                <tr>
                    <td style="text-align: center"><?php $i++; echo $i; ?></td>
                    <td style="text-align: center">{{ $item->code}}</td>
                    <td style="text-align: center">
                        <a href="{{URL::to('/detail_product')}}/{{$item->code}}">{{ $item->product_name }}</a>
                    </td>
                    <td style="text-align: center"><img style="width: 35px;height: 35px" src="public/backend/img_admin/{{ $item->product_img }}"></td>
                    <td style="text-align: center">{{ number_format($item->product_price) }} VND</td>
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
            </div>
        </div>
    </footer>
</div>
@endsection
