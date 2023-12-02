<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MyEShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="/" class="text-decoration-none">
                    <span class="h1 text-primary bg-dark px-2">My</span>
                    <span class="h1 text-dark bg-primary px-2 ml-n1">EShop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left searchit" style="position: relative">
{{--                <form action="{{route('search')}}" method="GET">--}}
                <form action="#" method="GET">
                    <div class="input-group">
                        <input id="search" type="text" class="form-control" name="searchkey" placeholder="Tìm kiếm sản phẩm...">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <div id="result-search-ajax" style="width: 444px; max-height: 300px; overflow: auto;">
                    <ul class="list-group" id="result-list" style="display:none">

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        @guest
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user mr-2"></i> Khách</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('login')}}">Đăng nhập</a>
                                <a class="dropdown-item" href="{{route('register')}}">Đăng kí</a>
                            </div>
                        @else
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user mr-2"></i>{{ Auth::user()->name }}</button>
                            <div class="dropdown-menu dropdown-menu-right">
{{--                                <a class="dropdown-item" href="#">User Profile</a>--}}
                                <a class="dropdown-item" href="/user/change-password">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endguest

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
{{--                        @foreach($categories as $category)--}}
{{--                            <div class="nav-item dropdown dropright">--}}
{{--                                <a href="/product-by-category/{{$category->id}}" class="nav-link dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    {{$category->category_name}}--}}
{{--                                    <i class="fa fa-angle-right float-right mt-1"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">--}}
{{--                                    @foreach($subcategories as $subcategory)--}}
{{--                                        @if($subcategory->category_id == $category->id)--}}
{{--                                            <a href="/product-by-subcategory/{{$subcategory->id}}" class="dropdown-item">--}}
{{--                                                {{$subcategory->subcategory_name}}--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link
{{--                            @if($currentURL == 'http://myeshop.test')--}}
{{--                                active--}}
{{--                            @endif--}}
                            ">Trang chủ</a>

                            <a href="/products" class="nav-item nav-link
{{--                            @if($currentURL == 'http://myeshop.test/products')--}}
{{--                                active--}}
{{--                            @endif--}}
                            ">Sản phẩm</a>

                            <a href="/cart/index" class="nav-item nav-link
{{--                            @if($currentURL == 'http://myeshop.test/cart/index')--}}
{{--                                active--}}
{{--                            @endif--}}
                            ">Giỏ hàng</a>

                            <a href="/checkout" class="nav-item nav-link
{{--                            @if($currentURL == 'http://myeshop.test/checkout')--}}
{{--                                active--}}
{{--                            @endif--}}
                            ">Thanh toán</a>

                            <a href="#" class="nav-item nav-link
{{--                            @if($currentURL == 'http://myeshop.test/contact')--}}
{{--                                active--}}
{{--                            @endif--}}
                            ">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            @auth
{{--                                <a href="{{route('wishlist.index')}}" class="btn px-0 ml-2">--}}
                                <a href="" class="btn px-0 ml-2">
                                    <i class="fas fa-heart text-primary"></i>
{{--                                    <span id="wishlist-count" class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{$wishlist_count}}</span>--}}
                                    <span id="wishlist-count" class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
                                </a>
                            @endauth
{{--                            <a href="{{route('cart.index')}}" class="btn px-0 ml-3">--}}
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
{{--                                <span id="cart-count" class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{Cart::count()}}</span>--}}
                                <span id="cart-count" class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')
{{--@php--}}
{{--dump(session()->all());--}}
{{--@endphp--}}
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Liên hệ chúng tôi</h5>
                <p class="mb-4">Công ty TNHH Thương Mại và Dịch Vụ Kỹ Thuật DIỆU PHÚC</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Cầu giấy, Hà Nội</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Thông tin và chính sách</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Mua hàng và thanh toán Online</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Mua hàng trả góp Online</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Tra thông tin bảo hành</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Tra cứu hoá đơn điện tử</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Trung tâm bảo hành chính hãng</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Quy định về việc sao lưu dữ liệu</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Dịch vụ và thông tin khác</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Khách hàng doanh nghiệp (B2B)</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Ưu đãi thanh toán</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Quy chế hoạt động</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Chính sách Bảo hành</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Liên hệ hợp tác kinh doanh</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Tuyển dụng</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Kết nối với MyEshop</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Địa chỉ email...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{asset('frontend/img/payments.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('frontend/mail/contact.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            // Dropdown menu
            $(document).ready(function () {
                function toggleNavbarMethod() {
                    if ($(window).width() > 992) {
                        $('.navbar .dropdown')
                        .on('click', function () {
                            const href = $('.dropdown-toggle', this).attr('href')
                            if (href) {
                                location.href = href
                            }
                        })
                        .on('mouseover', function () {
                            $('.dropdown-toggle', this).attr('aria-expanded', 'true');
                            $('.dropdown-menu', this).addClass('show');
                        })
                        .on('mouseout', function () {
                            $('.dropdown-toggle', this).attr('aria-expanded', 'false');
                            $('.dropdown-menu', this).removeClass('show');
                        });
                    } else {
                        $('.navbar .dropdown').off('mouseover').off('mouseout');
                    }
                }
                toggleNavbarMethod();
                $(window).resize(toggleNavbarMethod);
            });

            $('.loop').owlCarousel({
                center: true,
                items:2,
                loop:true,
                margin:10,
                responsive:{
                    600:{
                        items:4
                    }
                }
            });

            // Add to Wishlist Ajax
            $('.addWishlist').on('click', function(event) {
                event.preventDefault();
                var id = $(this).closest('.product-item-ajax').data("id");
                // alert(id);
                $.ajax({
                    url: "/wishlist/add/" + id,
                    type: "GET",
                    datType: "json",
                    success: function(data) {
                        var wishlistCountElement = $('#wishlist-count');
                        var wishlist_count = data['wishlist_count'];
                        wishlistCountElement.html(wishlist_count);
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        });

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                            icon: 'success',
                            title: data.success
                            })
                        } else {
                            Toast.fire({
                            icon: 'error',
                            title: data.error
                            })
                        }
                    }
                });
            });

            // Add to Cart Ajax
            $('.addToCart').on('click', function(event) {
                event.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: "/cart/add",
                    type: "POST",
                    datType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: ele.closest('.product-item-ajax').data("id"),
                        product_color: $('#color').find(":selected").val(),
                        product_qty: $('#qty').val()
                    },
                    success: function(data) {
                        var cartCountElement = $("#cart-count");
                        var cartCount = Number(data['cartCount']);
                        cartCountElement.html(cartCount);

                        var wishlistElement = $('#wishlist');
                        if(wishlistElement) {
                            var itemToRemove = ele.parents("tr");
                            itemToRemove.remove();
                            var wishlistCountElement = $('#wishlist-count');
                            var wishlist_count = data['wishlist_count'];
                            wishlistCountElement.html(wishlist_count);
                            if(wishlist_count == 0) {
                                wishlistElement.html('<p class="text-center">Your wishlist is empty!</p >');
                            }
                        }
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        });

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                            icon: 'success',
                            title: data.success
                            })
                        } else {
                            Toast.fire({
                            icon: 'error',
                            title: data.error
                            })
                        }
                    }
                });
            });

            // Update Cart Quantity Ajax
            $(".qty").change(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    {{--url: '{{ route('cart.update') }}',--}}
                    url: '',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        rowId: ele.parents("tr").attr("data-id"),
                        qty: ele.parents("tr").find(".qty").val()
                    },
                    success: function(response) {
                        var subtotalElement = ele.parents("tr").find(".total");
                        var subtotal = response['result']['price'] * response['result']['qty'];
                        var initialElement = $("#initial");
                        var initial = Number(response['initial']);
                        var taxElement = $("#tax");
                        var tax = Number(response['tax']);
                        var totalElement = $("#total");
                        var total = Number(response['total']) + Number(response['shipping_fee']);
                        var cartCountElement = $("#cart-count");
                        var cartCount = Number(response['cartCount']);
                        subtotalElement.html(subtotal.toLocaleString('en-US') + ' VNĐ');
                        initialElement.html(initial.toLocaleString('en-US') + ' VNĐ');
                        taxElement.html(tax.toLocaleString('en-US') + ' VNĐ');
                        totalElement.html(total.toLocaleString('en-US') + ' VNĐ');
                        cartCountElement.html(cartCount);
                    }
                });
            });

            // Delete Cart Item Ajax
            $(".removeCartItem").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                var rowId = ele.parents("tr").attr("data-id");
                $.ajax({
                    url: '/cart/remove/' + rowId,
                    method: "delete",
                    data: {
                        _token: '{{ csrf_token() }}'
                        // rowId: ele.parents("tr").attr("data-id"),
                    },
                    success: function(result) {
                        var cartCount = Number(result['cartCount']);
                        var cartCountElement = $("#cart-count");
                        cartCountElement.html(cartCount);
                        var itemToRemove = ele.parents("tr");
                        itemToRemove.remove();
                        var initialElement = $("#initial");
                        var initial = Number(result['initial']);
                        var taxElement = $("#tax");
                        var tax = Number(result['tax']);
                        var totalElement = $("#total");
                        var total = Number(result['total']) + Number(result['shipping_fee']);
                        initialElement.html(initial.toLocaleString('en-US') + ' VNĐ');
                        taxElement.html(tax.toLocaleString('en-US') + ' VNĐ');
                        totalElement.html(total.toLocaleString('en-US') + ' VNĐ');
                        if(cartCount == 0) {
                            var tableElement = $("#table");
                            tableElement.html('<p class="text-center">Your cart is empty!</p >');
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        if($.isEmptyObject(result.error)) {
                            Toast.fire({
                            icon: 'success',
                            title: result.success
                            })
                        } else {
                            Toast.fire({
                            icon: 'error',
                            title: result.error
                            })
                        }
                    }
                });
            });

            // Delete Product on Wishlist Ajax
            $('.delete-product-wishlist').on('click', function(event) {
                var ele = $(this);
                var id = ele.parents("tr").attr("data-id");

                $.ajax({
                    url: "/wishlist/remove/" + id,
                    method: "delete",
                    datType: "json",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        var wishlistCountElement = $('#wishlist-count');
                        var wishlist_count = data['wishlist_count'];
                        wishlistCountElement.html(wishlist_count);
                        var itemToRemove = ele.parents("tr");
                        itemToRemove.remove();
                        if(wishlist_count == 0) {
                            var wishlistElement = $('#wishlist');
                            wishlistElement.html('<p class="text-center">Your wishlist is empty!</p >');
                        }
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        });

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                            icon: 'success',
                            title: data.success
                            })
                        } else {
                            Toast.fire({
                            icon: 'error',
                            title: data.error
                            })
                        }
                    }
                });
            });

            // Search Products Ajax
            $('#search').keyup(function() {
                var searchkey = $('#search').val().trim();
                if(searchkey == "") {
                    $("#result-search-ajax").html("");
                    $('#result-list').hide();
                } else {
                    $.ajax({
                        url: "/searchajax",
                        type: "POST",
                        datType: "json",
                        data: {
                            _token: '{{ csrf_token() }}',
                            searchkey: searchkey
                        },
                        success: function(data) {
                            $('#result-search-ajax').empty().html(data);
                            $('#result-search-ajax').css({
                                "position": "absolute",
                                "z-index": "9999"
                            });
                            $('#result-list').show();
                        }
                    });
                }
            });

            // Toggle Dropdown Search Suggestion
            $('#search').on('blur', function(e){
                $("#result-search-ajax").fadeOut(500);
            });

            $('#search').on('focus', function(){
                $("#result-search-ajax").show();
            });

        });
    </script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

    @include('sweetalert::alert')
</body>

</html>
