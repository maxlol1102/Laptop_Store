@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')
    {{-- con day la phan code cua tung trang  --}}
    <style>
        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
            margin-right: 20px;
            margin-left: 20px;
        }
    </style>
    {{--Doanh thu thang--}}
    <div class="panel panel-default">
        <div class="panel-heading">
            Doanh thu tháng
        </div>
        <div class="table-responsive">
            <div style="text-align: center; background: #ddede0">
                <font style="color: red;font-size:20px">
                    <?php
                    $message = Session::get('message');
                    $mess = Session::get('notiAddCategory');
                    if ($message || $mess) {
                        echo $message;
                        echo $mess;
                        Session::put('message', null);
                        Session::put('notiAddCategory', null);
                    }
                    ?>
                </font>
            </div>
            <table class="table table-striped table-bordered">
                <thead style="">
                </thead>
                <tbody>
                <tr>
                    <th style="text-align: center">Tháng</th>
                    <th style="text-align: center">Tổng đơn</th>
                    <th style="text-align: center">Doanh thu</th>
                    <th style="text-align: center">Chi tiết</th>
                </tr>
                    <tr>
                        <td style="text-align: center">8/2022</td>
                        <td style="text-align: center">{{$tong_dh}}</td>
                        <td style="text-align: center">{{ number_format($tong_tien,0, '','.') }} VND</td>
                        <td style="text-align: center"><a href="{{URL::to('/hang-da-ban')}}">Chi tiết</a></td>
                </tr>
                </tbody>
            </table>


            {{--Doanh thu nam--}}
            <div class="panel-heading">
                Doanh thu năm
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                </thead>
                <tbody>
                <tr>
                    <th style="text-align: center">Năm</th>
                    <th style="text-align: center">Số đơn</th>
                    <th style="text-align: center">Doanh thu</th>
                </tr>
                <tr>
                    <td style="text-align: center" >2020 </td>
                    <td style="text-align: center">{{$tong_dh_nam_haimuoi}}</td>
                    <td style="text-align: center">{{ number_format($tong_tien_nam_haimuoi,0, '','.') }} VND</td>
                </tr>
                <tr>
                    <td style="text-align: center" >2021 </td>
                    <td style="text-align: center">{{$tong_dh_nam_haimot}}</td>
                    <td style="text-align: center">{{ number_format($tong_tien_nam_haimot,0, '','.') }} VND</td>
                </tr>
                <tr>
                    <td style="text-align: center" > 2022</td>
                    <td style="text-align: center"> {{$tong_dh_nam_haihai}}</td>
                    <td style="text-align: center">{{ number_format($tong_tien_nam_haihai,0, '','.') }} VND</td>
                </tr>
                <tr>
                    <th style="text-align: center" >Tổng cộng </th>
                    <td style="text-align: center">{{$tong_dh_all}}</td>
                    <td style="text-align: center">{{ number_format($tong_dt,0, '','.') }} VND</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-heading">
            Biểu đồ doanh thu
            <i class="fa fa-bar-chart"></i>
        </div>
        <div class="row">
            <div class="col-xl-6" style="flex: 0 0 auto;width: 50%;">
                <div class="card mb-4">
                    <div class="card-header">
                        Số đơn trong các tháng
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6" style="flex: 0 0 auto;width: 50%;">
                <div class="card mb-4">
                    <div class="card-header">
                        Lợi nhuận trong các năm
                    </div>
                    <div class="card-body">
                        <canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                crossorigin="anonymous"></script>
        <script type="text/javascript">

            // Biến in ra dữ liệu
            var _ydata = JSON.parse('{!! json_encode($months) !!}');
            var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');
        </script>
        <!-- Truy cập vào trang để bảng -->
        <script src="{{asset('public')}}/assets/demo/chart-area-demo.js"></script>
        <script src="{{asset('public')}}/assets/demo/chart-bar-demo.js"></script>
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
