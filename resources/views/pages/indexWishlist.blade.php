@extends('layouts.app')

@section('content')

{{--@include('layouts.breadcrumb')--}}

<!-- Cart Start -->
<div class="container-fluid" id="wishlist">
    @if($wishlist_count > 0)
        <div class="row px-xl-5">
            <div class="col table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Thông số</th>
                            <th>Màu sắc</th>
                            <th>Thêm vào giỏ hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($wishlist_items as $wishlist_item)
                            <tr data-id="{{$wishlist_item->product_id}}" class="product-item-ajax">
                                <td class="align-middle">
                                    <a style="color: #6C757D; text-decoration: none;" href="{{route('product.detail', $wishlist_item->product_id)}}">
                                        <img class="mr-2" src="{{asset('storage/backend/img/' . $wishlist_item->product->image_1)}}" alt="" style="width: 50px;">{{$wishlist_item->product->product_name}} - {{$wishlist_item->product->product_size}} - {{$wishlist_item->product->product_color}}
                                    </a>
                                </td>
                                <td class="align-middle">{{number_format($wishlist_item->product->discount_price)}} VNĐ</td>
                                <td class="align-middle">{{$wishlist_item->product->product_size}}</td>
                                <td class="align-middle">{{$wishlist_item->product->product_color}}</td>
                                <td class="align-middle"><button class="btn btn-sm btn-success addToCart"><i class="fa fa-shopping-cart"></i></i></button></td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger delete-product-wishlist"><i class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p class="text-center">Your wishlist is empty!</p >
    @endif

</div>
<!-- Cart End -->

@endsection
