Quý khách đã đặt hàng tại OniiChan-Shop <br>
Thông tin khách hàng <br>
-------------------- <br>
Tên Khách Hàng: {{$name}} <br>
Địa Chỉ: {{$address}} <br>
Số điện thoại: {{$phone}} <br>
Email: {{$email}} <br>
---------------------<br>
Thông tin đơn hàng<br>
@foreach($items as $item)
    Tên sản phẩm: {{$item->name}} <br>
    Số lượng: {{$item->qty}} <br>
@endforeach
Tổng Tiền: {{\Gloudemans\Shoppingcart\Facades\Cart::total()}} <br>
=======================<br>
