<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    @include('admin.layouts.components.meta')

    <!-- Title Page-->
    <title>@yield('title')</title>

    @include('admin.layouts.components.vendor_css')

</head>

<body class="animsition">

<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    @include('admin.layouts.components.left_menu')
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- HEADER DESKTOP-->
        @include('admin.layouts.components.header')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div style="padding-top: 90px" class="main-content">
            <div class="section__content">
                <div class="container-fluid">

                    {{--Start Table--}}
                    @yield('content')
                    {{--End Table--}}

                    {{--Debug--}}
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    @php
                        dump(session()->all());
                    @endphp
                    {{--END Debug--}}

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->

    </div>
    <!-- END PAGE CONTAINER-->

</div>

@include('admin.layouts.components.vendor_js')

</body>

</html>
<!-- end document-->
