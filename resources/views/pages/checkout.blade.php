@extends('layouts.app')

@section('content')

<!-- Cart Start -->
<form action="{{route('checkout.payment')}}" method="post">
    @csrf
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Mầu sắc</th>
                            <th>Thông số</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($contents as $content)
                            <tr>
                                <td class="align-middle"><img class="mr-2" src="{{asset('storage/backend/img/' . $content->options->image)}}" alt="" style="width: 50px;">{{$content->name}}</td>
                                <td class="align-middle">{{number_format($content->price)}} VNĐ</td>
                                <td class="align-middle">{{$content->options->color}}</td>
                                <td class="align-middle">{{$content->options->size}}</td>
                                <td class="align-middle">{{$content->qty}}</td>
                                <td class="align-middle">{{number_format($content->price * $content->qty)}} VNĐ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="align-middle">Tổng cần thanh toán: {{number_format(Cart::total() + $shipping_fee)}} VNĐ</td>
                        </tr>
                    </tbody>
                </table>

                {{-- Payment Methods --}}
                <h5 class="section-title position-relative text-uppercase mt-5 mb-3"><span class="bg-secondary pr-3">Chọn phương thức thanh toán</span></h5>
                <div class="form-group">
                    @foreach($payment_methods as $payment_method)
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="payment_method_id" value="{{$payment_method->id}}">{{$payment_method->name}}
                            </label>
                        </div>
                    @endforeach
                    <div class="text-danger">@error('payment_method_id') {{$message}} @enderror</div>
                </div>

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin vận chuyển</span></h5>
                @guest
                    <div class="form-group">
                        <label for="shipping_name">Họ và tên người nhận:</label>
                        <input class="form-control" type="text" id="name" name="shipping_name" placeholder="Họ và tên người nhận..." value="{{old('shipping_name')}}">
                        <span class="text-danger">@error('shipping_name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="shipping_email">Địa chỉ email người nhận:</label>
                        <input class="form-control" type="text" id="email" name="shipping_email" placeholder="Địa chỉ email người nhận..." value="{{old('shipping_email')}}">
                        <span class="text-danger">@error('shipping_email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="shipping_phone">Số điện thoại người nhận:</label>
                        <input class="form-control" type="text" id="phone" name="shipping_phone" placeholder="Số điện thoại người nhận..." value="{{old('shipping_phone')}}">
                        <span class="text-danger">@error('shipping_phone') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="shipping_address">Địa chỉ người nhận:</label>
                        <input class="form-control" type="text" id="address" name="shipping_address" placeholder="Địa chỉ người nhận..." value="{{old('shipping_address')}}">
                        <span class="text-danger">@error('shipping_address') {{$message}} @enderror</span>
                    </div>
                @else
                    <div class="form-group">
                        <label for="shipping_name">Họ và tên người nhận:</label>
                        <input class="form-control" type="text" id="name" name="shipping_name" placeholder="Họ và tên người nhận..." value="{{Auth::user()->name}}">
                        <span class="text-danger">@error('shipping_name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="shipping_email">Địa chỉ email người nhận:</label>
                        <input class="form-control" type="text" id="email" name="shipping_email" placeholder="Địa chỉ email người nhận..." value="{{Auth::user()->email}}">
                        <span class="text-danger">@error('shipping_email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="shipping_phone">Số điện thoại người nhận:</label>
                        <input class="form-control" type="text" id="phone" name="shipping_phone" placeholder="Số điện thoại người nhận..." value="{{Auth::user()->phone}}">
                        <span class="text-danger">@error('shipping_phone') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="shipping_address">Địa chỉ người nhận:</label>
                        <input class="form-control" type="text" id="address" name="shipping_address" placeholder="Địa chỉ người nhận..." value="{{Auth::user()->address}}">
                        <span class="text-danger">@error('shipping_address') {{$message}} @enderror</span>
                    </div>
                @endguest

                <div class="form-group">
                    <label for="shipping_note">Ghi chú:</label>
                    <textarea class="form-control" type="textarea" id="note" name="shipping_note" placeholder="Ghi chú...">{{old('shipping_note')}}</textarea>
                    <span class="text-danger">@error('shipping_note') {{$message}} @enderror</span>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Mua hàng</button>
            </div>
        </div>
    </div>
</form>
<!-- Cart End -->

@endsection
