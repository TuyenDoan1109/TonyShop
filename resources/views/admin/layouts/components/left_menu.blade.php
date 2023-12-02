<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{asset('backend/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">

                {{-- category --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.categories') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.categories.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Danh Mục</strong>
                    </a>
                </li>

                {{-- brand --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.brands') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.brands.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Thương Hiệu</strong>
                    </a>
                </li>

                {{-- product --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.products') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.products.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Sản Phẩm</strong>
                    </a>
                </li>

                {{-- user --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.users') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>User</strong>
                    </a>
                </li>

                {{-- admin --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.admins') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.admins.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Admin</strong>
                    </a>
                </li>

                {{-- role --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.roles') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.roles.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Vai trò</strong>
                    </a>
                </li>

                {{-- permission --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.permissions') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.permissions.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Quyền</strong>
                    </a>
                </li>

                {{-- calendar --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.calendars') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.calendars.getEvent')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Calendar</strong>
                    </a>
                </li>

                {{-- post --}}
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.posts') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.posts.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Post</strong>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
