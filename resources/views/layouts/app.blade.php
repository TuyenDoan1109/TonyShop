<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.components.meta')

    @yield('title')

    @include('layouts.components.vendor_font')

    @include('layouts.components.vendor_css')
</head>

<body>
    @include('layouts.components.topbar')

    @include('layouts.components.navbar')

    @yield('content')

    @include('layouts.components.footer')

    @include('layouts.components.vendor_js')
</body>

</html>
