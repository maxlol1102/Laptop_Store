@extends('layout-cart')
@section('content')
    <br>
<section id="cart_items">
    <div class="container" >
        <div class="breadcrumbs" style="text-align: center">
            <ol class="breadcrumb">
            <li class="active"><h3 style="font-size: 40px">GIỎ HÀNG CỦA BẠN</h3></li>
            </ol>
        </div>

        <div class="table-responsive cart_info">
            <?php
                $Product = Cart::content();//lay tat ca nhung gi da them vao gio hang
                if(Cart::subtotal(null, null, '') == 0) {
                    // an table san pham da them

                    echo "
                        <img src='https://assets.materialup.com/uploads/16e7d0ed-140b-4f86-9b7e-d9d1c04edb2b/preview.png' style='text-align: center; width: 710px; height: 350px; padding-left: 400px'>
                        <h5 style = 'text-align: center; font-size: 24px; font-family:Calibri; color: red'>Your Cart is Empty !</h5>
                        <a href='./trang-chu' class='btn btn-primary' style='border-radius:4px; padding: 12px; font-family: Calibri; font-size: 16px; margin: 10px 0 10px 490px'> Continue Shopping!</a>
                    ";
                } else {
            ?>
                <table style="width: 100%;" class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td style="text-align: center; width: 50px;">Hình ảnh</td>
                            <td style="text-align: center; width: 400px;">Tên sản phẩm</td>
                            <td style="text-align: center">Đơn giá</td>
                            <td style="text-align: center; width: 50px;">Số lượng</td>
                            <td style="text-align: center">Tổng tiền</td>
                            <td style="text-align: center">Chức năng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Product as $v_content)
                        <tr>
                            <td style="text-align: center; vertical-align: bottom">
                                <img src="{{URL::to('public/backend/img_admin/'.$v_content->options->image)}}" width="70" alt="" />
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <a href="{{URL::to('/detail_product')}}/{{$v_content->code}}" style="font-size: 14px;">{{$v_content->name}}</a>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <font style="font-size: 14px;">{{number_format($v_content->price).''.'vnđ'}}</font>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <div>
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{ csrf_field() }}
                                        <input style="width: 80px; height: 30px" class="cart_quantity_input" type="number" min ="1" name="cart_quantity" value="{{$v_content->qty}}"  >
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                        <input style="width: 80px; height: 30px; font-size: 14px;" type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <font style="font-size: 14px" class="cart_total_price">
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).' '.'VND';
                                    ?>
                                </font>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart')}}/{{$v_content->rowId}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <?php
                }
            ?>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" >
                <?php
                    if(Cart::subtotal(null, null, '') == 0) { // an form dat hang
                    } else {
                ?>
                    <div class="total_area" style="background-color: #f5f5f5">
                        <ul>
                            <li>Tổng tiền <span>{{number_format(Cart::subtotal(null, null,'')).' '.'VND'}}</span></li>
                            <li>Thuế VAT <span>10%</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            {{-- tinh tong tien phai thanh toan sau thue --}}
                          <li>Thành tiền (Đã bao gồm thuế VAT)
                              <span>
                              <?php
                              $subtotal_VAT =  $subtotal + $subtotal * 0.1;
                              echo number_format($subtotal_VAT).' '.'VND';
                              ?>
                              </span>
                            </li>
                        </ul>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id == NULL){
                            ?>
                                <a class="btn btn-default check_out" href="{{URL::to('/signin')}}">Đặt hàng</a>
                            <?php
                                } else {
                            ?>
                                <input type="hidden" name="id_customer_hidden" value="<?php echo $customer_id; ?>">
                                <a class="btn btn-default check_out" style="font-weight: bold; font-size: 16px; border-radius: 10px; padding: 10px 15px 10px 15px; margin-left: 60px;" href="{{URL::to('/save-order')}}">Đặt hàng</a>
                                <a class="btn btn-default check_out" style="font-weight: bold; font-size: 16px; border-radius: 10px; padding: 10px" href="{{url('/trang-chu')}}"">Continue Shopping!</a>
                            <?php
                                }
                            ?>
                    </div>
            </div>

            <div class="col-sm-6">
                <div class="total_area" style="background-color: #333333;text-transform: uppercase;font-size: 22px;color: #FFFFFF; padding-left: 50px;letter-spacing: 1.5px; font-weight: bold">
                    <p><i class="fa fa-truck" style="color: #FE980F"></i> Giao hàng miễn phí</p>
                    <p><i class="fa fa-clock-o" style="color: #FE980F"></i> Thanh toán khi nhận hàng</p>
                    <p><i class="fa fa-phone" style="color: #FE980F"></i> Hỗ trợ 24/7</p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section><!--/#do_action-->
<br>

@endsection
