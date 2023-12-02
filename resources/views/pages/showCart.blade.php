@extends('layouts.app')

@section('content')

{{--@include('layouts.breadcrumb')--}}

<!-- Cart Start -->
<div id="table" class="container-fluid">
    @if(count($contents) > 0)
        <div class="row px-xl-5">
            <div class="col table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th style="width:9rem">Giá</th>
                            <th style="width:9rem">Mầu sắc</th>
                            <th style="width:9rem">Thông số</th>
                            <th style="width:9rem">Số lượng</th>
                            <th style="width:10rem">Tổng tiền</th>
                            <th style="width:9rem"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($contents as $content)
                            <tr data-id="{{ $content->rowId }}">
                                <td class="align-middle">
                                    <a style="color: #6C757D; text-decoration: none;" href="{{route('product.detail', $content->id)}}">
                                        <img class="mr-2" src="{{asset('storage/backend/img/' . $content->options->image)}}" alt="" style="width: 50px;">{{$content->name}}
                                    </a>
                                </td>
                                <td class="align-middle price">{{number_format($content->price)}} VNĐ</td>
                                <td class="align-middle">{{$content->options->color}}</td>
                                <td class="align-middle">{{$content->options->size}}</td>
                                <td class="align-middle">
                                    <input type="number" min="1" value="{{$content->qty}}" class="form-control qty" />
                                </td>
                                <td class="align-middle total">{{number_format($content->price * $content->qty)}} VNĐ</td>
                                <td class="align-middle"><a class="btn btn-sm btn-danger removeCartItem"><i class="fa fa-times"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row px-xl-5 d-flex justify-content-end">
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng</h6>
                            <h6 id="initial">{{number_format(Cart::initial())}} VNĐ</h6>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Phí ship</h6>
                            <h6 id="shipping-fee" class="font-weight-medium" value="{{$shipping_fee}}">+{{number_format($shipping_fee)}} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">

                            <h6 class="font-weight-medium">VAT<small>({{(Cart::tax() / Cart::initial()) * 100}} %)</small></h6>

                            <h6 id="tax" class="font-weight-medium">+{{number_format(Cart::tax())}} VNĐ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Thanh toán</h5>
                            <h5 id="total">{{number_format(Cart::total() + $shipping_fee)}} VNĐ</h5>
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiếp tục thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">Giỏ hàng bạn rỗng!</p >
    @endif
</div>
<!-- Cart End -->

@endsection
