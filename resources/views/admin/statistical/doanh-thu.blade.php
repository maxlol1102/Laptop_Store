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
                        <td style="text-align: center">9/2022</td>
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
    </div>
@endsection


@section('chart')
<style>
    #wrapChart{
        width: 1050px;
 
    }

</style>

    <div class="panel-heading">
        Biểu đồ
        <i class="fa fa-bar-chart"></i>
    </div>
        <div class="row" style="background-color:#ffffff; padding: 20px; margin:0px">
            
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div class="col-xl-6" style="flex: 0 0 auto;width: 50%;">
                <div class="card mb-4">
                    
                    <div id="wrapChart">
                        <div id="piechart" style="width:100%; max-width:400px; height:500px;float:left;"></div>

                        <div id="LineChart" style="width:100%; max-width:650px; height:500px; float:left"></div>
                    </div>
                 
            <!-- Bảng PieChart -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script type="text/javascript">
                  google.charts.load('current', {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(function () {
                    load_data();
                    load_line_data();
                });
                function drawChart(drawChart) {
            
                    let jsonData = drawChart;
                    let data = new google.visualization.arrayToDataTable([]);
                    data.addColumn({type: 'string', label:'Name'});
                    data.addColumn({type: 'number', label: 'Order_status'});
                
                    $.each(jsonData, (i, jsonData) => {
                        let name = jsonData.name;
                        let order_status = jsonData.order_status;
                        data.addRows([
                            [name, order_status]
                        ]);
                    });
                    var options = {
                        title: 'Thống kê đơn hàng',
                        is3D: true,
                        // width: '100%',
                        // height: '100%',
                    // colors: ['#D44E41'],
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }

            </script>
            <script>
                function load_data() {
                    $.ajax({
                        url: 'fetch_data',
                        method: 'GET',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "JSON",
                        success: function (data) {
                            drawChart(data);
                        }
                    });
                }
            </script>

            <!-- Bảng lineChart -->
            <script>
                function drawLineChart(drawLineChart) {
                
                    let jsonData = drawLineChart;
                    console.log(jsonData);
                    let data = new google.visualization.arrayToDataTable([]);
                    data.addColumn({type: 'string', label:'label'});
                    data.addColumn({type: 'number', label: 'amount'});
                
                    $.each(jsonData, (i, jsonData) => {
                        let label = jsonData.label;
                        let amount = jsonData.amount;
                        data.addRows([
                            [label, amount]
                        ]);
                        
                    });

                    // Set Options
                    var options = {
                        title: 'Doanh thu qua từng tháng trong năm nay',
                        vAxis: {title: 'Giá (Triệu VND)'},
                        hAxis: {title: 'Tháng'},
                        legend: 'none'
                    };
                    // Draw Chart
                    var chart = new google.visualization.LineChart(document.getElementById('LineChart'));
                    chart.draw(data, options);
                }
         
                function load_line_data() {
                    $.ajax({
                        url: 'DoanhThuThang',
                        method: 'GET',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "JSON",
                        success: function (data) {
                            drawLineChart(data);
                        }
                    });
                }
            </script>
        



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