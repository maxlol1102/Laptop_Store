@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/thong-ke-san-pham')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Top sản phẩm bán nhiều nhất</b></font><br>
        </form>
        <br>
    </div>
        <div class="table-responsive">
        
    <table class="table table-striped table-bordered">
        <thead style="background: #ddede0">
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã danh mục</th>
            <th style="text-align: center">Mã sản phẩm </th>
            <th style="text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Ảnh sản phẩm</th>

        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($db_statistical_product as $item)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{ $item->category_id}}</td>
            <td style="text-align: center">{{ $item->code}}</td>
            <td style="text-align: center">{{ $item->product_name }}</td>
            <td style="text-align: center"><img style="width: 35px;height: 35px" src="public/backend/img_admin/{{ $item->product_img }}"></td>

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
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/thong-ke-san-pham')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Top sản phẩm bán ít nhất</b></font><br>
        </form>
        <br>
    </div>
    <div class="table-responsive">
        
        <table class="table table-striped table-bordered">
            <thead style="background: #ddede0">
            <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã danh mục</th>
                <th style="text-align: center">Mã sản phẩm </th>
                <th style="text-align: center">Tên sản phẩm</th>
                <th style="text-align: center">Ảnh sản phẩm</th>
       
            </tr>
            </thead>
            <tbody><?php $i = 0; ?>
            @foreach($db_statistical_product as $item)
                <tr>
                    <td style="text-align: center"><?php $i++; echo $i; ?></td>
                    <td style="text-align: center">{{ $item->category_id}}</td>
                    <td style="text-align: center">{{ $item->code}}</td>
                    <td style="text-align: center">{{ $item->product_name }}</td>
                    <td style="text-align: center"><img style="width: 35px;height: 35px" src="public/backend/img_admin/{{ $item->product_img }}"></td>
       
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
</div>
@endsection
