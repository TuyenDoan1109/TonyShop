@extends('layouts.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('frontend/img/1.webp')}}" style="object-fit: cover;">
{{--                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">--}}
{{--                                <div class="p-3" style="max-width: 700px;">--}}
{{--                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Iphone</h1>--}}
{{--                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>--}}
{{--                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('frontend/img/2.webp')}}" style="object-fit: cover;">
{{--                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">--}}
{{--                                <div class="p-3" style="max-width: 700px;">--}}
{{--                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Samsung</h1>--}}
{{--                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>--}}
{{--                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('frontend/img/3.webp')}}" style="object-fit: cover;">
{{--                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">--}}
{{--                                <div class="p-3" style="max-width: 700px;">--}}
{{--                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Xiaomi</h1>--}}
{{--                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>--}}
{{--                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!-- CONTROLS -->
                <a href="#header-carousel" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>

                <a href="#header-carousel" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{asset('frontend/img/4.webp')}}" alt="">
{{--                    <div class="offer-text">--}}
{{--                        <h6 class="text-white text-uppercase">Save 20%</h6>--}}
{{--                        <h3 class="text-white mb-3">Special Offer</h3>--}}
{{--                        <a href="" class="btn btn-primary">Shop Now</a>--}}
{{--                    </div>--}}
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{asset('frontend/img/5.webp')}}" alt="">
{{--                    <div class="offer-text">--}}
{{--                        <h6 class="text-white text-uppercase">Save 20%</h6>--}}
{{--                        <h3 class="text-white mb-3">Special Offer</h3>--}}
{{--                        <a href="" class="btn btn-primary">Shop Now</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14 - Đổi trả hàng miễn phí</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Tư vấn 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Phones Start -->
{{--    <div class="container-fluid pt-5 pb-3">--}}
{{--        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Điện Thoại thông minh</span></h2>--}}
{{--        <div class="row px-xl-5">--}}
{{--            @foreach($phones as $phone)--}}
{{--                <div class="col-lg-3 col-md-4 col-sm-6 pb-1 product-item-ajax" data-id="{{$phone->id}}">--}}
{{--                    <div class="product-item bg-light mb-4">--}}
{{--                        <div style="height: 300px" class="product-img position-relative overflow-hidden">--}}
{{--                            <img class="img-fluid w-100" src="{{asset('storage/backend/img/' . $phone->image_1)}}" alt="">--}}
{{--                            <div class="product-action">--}}
{{--                                <a class="btn btn-outline-dark btn-square addWishlist"><i class="fa fa-heart"></i></a>--}}
{{--                                <a class="btn btn-outline-dark btn-square addToCart"><i class="fa fa-shopping-cart"></i></a>--}}
{{--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>--}}
{{--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="text-center py-4">--}}
{{--                            <a class="h6 text-decoration-none text-truncate" href="/product/{{$phone->id}}">--}}
{{--                                {{$phone->product_name}} ---}}
{{--                                {{$phone->product_size}} ---}}
{{--                                {{$phone->product_color}}--}}
{{--                            </a>--}}
{{--                            <div class="d-flex align-items-center justify-content-center mt-2">--}}
{{--                                <h5>{{number_format($phone->discount_price)}} VNĐ</h5>--}}
{{--                                <h6 class="text-muted ml-2">--}}
{{--                                    <del>{{number_format($phone->selling_price)}} VNĐ</del>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center justify-content-center mb-1">--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small>(99)</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Phones End -->

    <!-- Laptops Start -->
{{--    <div class="container-fluid pt-5 pb-3">--}}
{{--        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Laptop</span></h2>--}}
{{--        <div class="row px-xl-5">--}}
{{--            @foreach($laptops as $laptop)--}}
{{--                <div class="col-lg-3 col-md-4 col-sm-6 pb-1 product-item-ajax" data-id="{{$laptop->id}}">--}}
{{--                    <div class="product-item bg-light mb-4">--}}
{{--                        <div style="height: 300px" class="product-img position-relative overflow-hidden">--}}
{{--                            <img class="img-fluid w-100" src="{{asset('storage/backend/img/' . $laptop->image_1)}}" alt="">--}}
{{--                            <div class="product-action">--}}
{{--                                <a data-id="{{$laptop->id}}" class="btn btn-outline-dark btn-square addWishlist">--}}
{{--                                    <i class="fa fa-heart"></i>--}}
{{--                                </a>--}}
{{--                                <a data-id="{{$laptop->id}}" class="btn btn-outline-dark btn-square addToCart">--}}
{{--                                    <i class="fa fa-shopping-cart"></i>--}}
{{--                                </a>--}}
{{--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>--}}
{{--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="text-center py-4">--}}
{{--                            <a class="h6 text-decoration-none text-truncate" href="/product/{{$laptop->id}}">--}}
{{--                                {{$laptop->product_name}} ---}}
{{--                                {{$laptop->product_size}} ---}}
{{--                                {{$laptop->product_color}}--}}
{{--                            </a>--}}
{{--                            <div class="d-flex align-items-center justify-content-center mt-2">--}}
{{--                                <h5>{{number_format($laptop->discount_price)}} VNĐ</h5>--}}
{{--                                <h6 class="text-muted ml-2">--}}
{{--                                    <del>{{number_format($laptop->discount_price)}} VNĐ</del>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center justify-content-center mb-1">--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small>(99)</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Laptops End -->

    <!-- Tablets Start -->
{{--    <div class="container-fluid pt-5 pb-3">--}}
{{--        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Máy tính bảng</span></h2>--}}
{{--        <div class="row px-xl-5">--}}
{{--            @foreach($tablets as $tablet)--}}
{{--                <div class="col-lg-3 col-md-4 col-sm-6 pb-1 product-item-ajax" data-id="{{$tablet->id}}">--}}
{{--                    <div class="product-item bg-light mb-4">--}}
{{--                        <div style="height: 300px" class="product-img position-relative overflow-hidden">--}}
{{--                            <img class="img-fluid w-100" src="{{asset('storage/backend/img/' . $tablet->image_1)}}" alt="">--}}
{{--                            <div class="product-action">--}}
{{--                                <a data-id="{{$tablet->id}}" class="btn btn-outline-dark btn-square addWishlist">--}}
{{--                                    <i class="fa fa-heart"></i>--}}
{{--                                </a>--}}
{{--                                <a data-id="{{$tablet->id}}" class="btn btn-outline-dark btn-square addToCart">--}}
{{--                                    <i class="fa fa-shopping-cart"></i>--}}
{{--                                </a>--}}
{{--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>--}}
{{--                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="text-center py-4">--}}
{{--                            <a class="h6 text-decoration-none text-truncate" href="/product/{{$tablet->id}}">--}}
{{--                                {{$tablet->product_name}} ---}}
{{--                                {{$tablet->product_size}} ---}}
{{--                                {{$tablet->product_color}}--}}
{{--                            </a>--}}
{{--                            <div class="d-flex align-items-center justify-content-center mt-2">--}}
{{--                                <h5>{{number_format($tablet->discount_price)}} VNĐ</h5>--}}
{{--                                <h6 class="text-muted ml-2">--}}
{{--                                    <del>{{number_format($tablet->discount_price)}} VNĐ</del>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center justify-content-center mb-1">--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small class="fa fa-star text-primary mr-1"></small>--}}
{{--                                <small>(99)</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Tablets End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel owl-theme">
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="item bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
