 @extends('admin_layout')     {{-- ke thua lai cua trang admin_layout --}}  {{-- ket noi vs adminlayout --}}
 @section('admin_content')		{{-- noi nao nhan trang nay thi goi ra --}}
 <h3 style="text-align: center;padding-bottom: 30px; font-family: 'Open Sans'; font-size: 30px"><font color="white">Chào mừng bạn đến với trang quản lý MY-COMPUTER</font></h3>

 <!-- /.row -->
 <div class="row" style="background: #999; padding-top: 20px;;">
     <div class="col-lg-3 col-md-6">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <div class="row" style="background: #1b6d85; margin: 0 -16px;">
                     <div class="col-xs-3">
                         <i class="fa fa-comments" style="font-size: 85px;padding: 0px;color: white;}"></i>
                     </div>
                     <div class="col-xs-9 text-right" style="color: white;">
                         <div class="huge" style="font-size: 70px; padding-top: 5px;">
                            4
                         </div>
                         <div style="font-size: 11px;">Đơn hàng đang chờ xử lí</div>
                     </div>
                 </div>
             </div>
             <a href="{{URL::to('/order-manager')}}">
                 <div class="panel-footer">
                     <span class="pull-left" style="padding-top: 10px;">Xem chi tiết</span>
                     <span class="pull-right" style="padding-top: 10px;"><i class="fa fa-arrow-circle-right"></i></span>
                     <div class="clearfix"></div>
                 </div>
             </a>
         </div>
     </div>
     <div class="col-lg-3 col-md-6">
         <div class="panel panel-green">
             <div class="panel-heading" >
                 <div class="row" style="background: #3c763d; margin: 0 -16px;">
                     <div class="col-xs-3">
                         <i class="fa fa-users " style="font-size: 80px;padding: 15px 0;color: white;"></i>
                     </div>
                     <div class="col-xs-9 text-right" style="color: white;">
                         <div class="huge" style="font-size: 70px; padding-top: 5px;">10</div>
                         <div style="font-size: 11px;">Khách hàng</div>
                     </div>
                 </div>
             </div>
             <a href="{{URL::to('/all-customer')}}">
                 <div class="panel-footer">
                     <span class="pull-left" style="padding-top: 10px;">Xem chi tiết</span>
                     <span class="pull-right" style="padding-top: 10px;"><i class="fa fa-arrow-circle-right"></i></span>
                     <div class="clearfix"></div>
                 </div>
             </a>
         </div>
     </div>
     <div class="col-lg-3 col-md-6">
         <div class="panel panel-yellow">
             <div class="panel-heading" >
                 <div class="row" style="background: #d58512; margin: 0 -16px;">
                     <div class="col-xs-3">
                         <i class="fa fa-shopping-cart" style="font-size: 95px; padding: 4px; color: white;"></i>
                     </div>
                     <div class="col-xs-9 text-right" style="color: white;">
                         <div class="huge" style="font-size: 70px; padding-top: 5px;">
                             {{49}}
                         </div>
                         <div style="font-size: 11px;">Đơn hàng đã giao</div>
                     </div>
                 </div>
             </div>
             <a href="{{URL::to('/order-manager-successfully')}}">
                 <div class="panel-footer">
                     <span class="pull-left" style="padding-top: 10px;">Xem chi tiết</span>
                     <span class="pull-right" style="padding-top: 10px;"><i class="fa fa-arrow-circle-right"></i></span>
                     <div class="clearfix"></div>
                 </div>
             </a>
         </div>
     </div>
     <div class="col-lg-3 col-md-6">
         <div class="panel panel-red">
             <div class="panel-heading" >
                 <div class="row" style="background: #ac2925; margin: 0 -16px;">
                     <div class="col-xs-3">
                         <i class="fa fa-barcode" style="font-size: 85px;padding: 17px 0; color: white;"></i>
                     </div>
                     <div class="col-xs-9 text-right" style="color: white;">
                         <div class="huge" style="font-size: 70px; padding-top: 5px;">243</div>
                         <div style="font-size: 11px;">Sản phẩm</div>
                     </div>
                 </div>
             </div>
             <a href="{{URL::to('/all-product')}}">
                 <div class="panel-footer">
                     <span class="pull-left" style="padding-top: 10px;">Xem chi tiết</span>
                     <span class="pull-right" style="padding-top: 10px;"><i class="fa fa-arrow-circle-right"></i></span>
                     <div class="clearfix"></div>
                 </div>
             </a>
         </div>
     </div>
 </div>
 <!-- /.row -->
 @endsection
