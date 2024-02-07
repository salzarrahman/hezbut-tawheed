<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 "> {{ __(Str::ucfirst(Request::segment(1))) }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb mb-0 p-0">
                @if(Request::segment(1))
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">
                        <i class="bx bx-home-alt "></i>
                    </a>
                </li>
                @endif

                @if(Request::segment(2))
                <li class="breadcrumb-item " aria-current="page">
                    @yield('breadcrumb_link_one')
                </li>
                @endif

                @if(is_numeric(Request::segment(3)))
                    <li class="breadcrumb-item active " aria-current="page">
                        @yield('breadcrumb_link_three')
                    </li>
                @elseif(is_string(Request::segment(3)))
                    <li class="breadcrumb-item active " aria-current="page">
                        @yield('breadcrumb_link_two')
                    </li>
                @endif



            </ol>
        </nav>
    </div>
    @yield('breadcrumb_sub_link')
</div>
