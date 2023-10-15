<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="index.html">
                <img class="d-none d-lg-block blur-up lazyloaded"
                src="{{ asset('assets/images/dashboard/multikart-logo.png') }}" alt="">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
            aria-hidden="true"></i>
        </a>
        <div class="sidebar-user">
            <img class="img-60" src="{{ asset('assets/images/dashboard/user3.jpg') }}" alt="#">
            <div>
                <h6 class="f-14">{{ Auth::user()->name }}</h6>
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{ route('dashboard') }}" style="display: flex; align-items: center;">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- @dd() --}}
            @if(Auth::user()->with('role')->first()->role->produkCreate == 'aktif' || Auth::user()->with('role')->first()->role->produkList == 'aktif' || Auth::user()->with('role')->first()->role->produkKategoriList == 'aktif')
            <li>
                <a class="sidebar-header" href="javascript:void(0)" style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center;">
                        <i data-feather="box"></i>
                        <span>Products</span>
                    </div>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>


                <ul class="sidebar-submenu">
                    @if(Auth::user()->with('role')->first()->role->produkCreate == 'aktif')
                    <li>
                        <a href="{{ route('produk.add') }}">
                            <i class="fa fa-circle"></i>
                            <span>Add Product</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->produkList == 'aktif')
                    <li>
                        <a href="{{ route('produk.list') }}">
                            <i class="fa fa-circle"></i>
                            <span>List Produk</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->produkKategoriList == 'aktif')
                    <li>
                        <a href="{{ route('produk.kategori') }}">
                            <i class="fa fa-circle"></i>
                            <span>Kategori Produk</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(Auth::user()->with('role')->first()->role->sliderList == 'aktif' || Auth::user()->with('role')->first()->role->bannerList == 'aktif')
            <li>
                <a class="sidebar-header" href="javascript:void(0)" style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center;">
                        <i data-feather="archive"></i>
                        <span>Home</span>
                    </div>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    @if(Auth::user()->with('role')->first()->role->sliderList == 'aktif')
                    <li>
                        <a href="{{ route('home.slider.list') }}">
                            <i class="fa fa-circle"></i>
                            <span>Slider List</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->bannerList == 'aktif')
                    <li>
                        <a href="{{ route('home.banner.list') }}">
                            <i class="fa fa-circle"></i>
                            <span>Banner List</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li> 
            @endif
            {{--
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="dollar-sign"></i>
                    <span>Sales</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="order.html">
                            <i class="fa fa-circle"></i>Orders
                        </a>
                    </li>
                    <li>
                        <a href="transactions.html">
                            <i class="fa fa-circle"></i>Transactions
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Setting</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">

                    <li>
                        <a href="?page=seo-optimize">
                            <i class="fa fa-circle"></i> Web Setting
                        </a>
                    </li>
                    <li>
                        <a href="coupon-list.html">
                            <i class="fa fa-circle"></i> Language
                        </a>
                    </li>
                </ul>
            </li> --}}
            @if(Auth::user()->with('role')->first()->role->pageList == 'aktif' || Auth::user()->with('role')->first()->role->pageCreate == 'aktif' || Auth::user()->with('role')->first()->role->pageKategoriList == 'aktif')
            <li>
                <a class="sidebar-header" href="javascript:void(0)" style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; ">
                        <i data-feather="clipboard"></i>
                        <span>Pages</span>
                    </div>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    @if(Auth::user()->with('role')->first()->role->pageList == 'aktif')
                    <li>
                        <a href="{{ route('page.list') }}">
                            <i class="fa fa-circle"></i>List Page
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->pageCreate == 'aktif')
                    <li>
                        <a href="{{ route('page.add') }}">
                            <i class="fa fa-circle"></i>Create Page
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->pageKategoriList == 'aktif')
                    <li>
                        <a href="{{ route('page.kategori.list') }}">
                            <i class="fa fa-circle"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- <li>
                <a class="sidebar-header" href="media.html">
                    <i data-feather="camera"></i>
                    <span>Media</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="align-left"></i>
                    <span>Menus</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="menu-list.html">
                            <i class="fa fa-circle"></i>Menu Lists
                        </a>
                    </li>
                    <li>
                        <a href="create-menu.html">
                            <i class="fa fa-circle"></i>Create Menu
                        </a>
                    </li>
                </ul>
            </li> --}}
            @if(Auth::user()->with('role')->first()->role->userList == 'aktif' || Auth::user()->with('role')->first()->role->userCreate == 'aktif' || Auth::user()->with('role')->first()->role->user_aksesList == 'aktif')
            <li>
                <a class="sidebar-header" href="javascript:void(0)" style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; ">
                        <i data-feather="user-plus"></i>
                        <span>Users</span>
                    </div>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    @if(Auth::user()->with('role')->first()->role->userList == 'aktif')
                    <li>
                        <a href="{{ route('user.list') }}">
                            <i class="fa fa-circle"></i>User List
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->userCreate == 'aktif')
                    <li>
                        <a href="{{ route('user.create') }}">
                            <i class="fa fa-circle"></i>Create User
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->user_aksesList == 'aktif')
                    <li>
                        <a href="{{ route('user.role') }}">
                            <i class="fa fa-circle"></i>Hak Akses
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            {{-- <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="users"></i>
                    <span>Vendors</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="list-vendor.html">
                            <i class="fa fa-circle"></i>Vendor List
                        </a>
                    </li>
                    <li>
                        <a href="create-vendors.html">
                            <i class="fa fa-circle"></i>Create Vendor
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="chrome"></i>
                    <span>Localization</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="translations.html"><i class="fa fa-circle"></i>Translations
                        </a>
                    </li>
                    <li>
                        <a href="currency-rates.html"><i class="fa fa-circle"></i>Currency Rates
                        </a>
                    </li>
                    <li>
                        <a href="taxes.html"><i class="fa fa-circle"></i>Taxes
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="support-ticket.html"><i
                    data-feather="phone"></i><span>Support Ticket</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="reports.html"><i
                    data-feather="bar-chart"></i><span>Reports</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)"><i
                    data-feather="settings"></i><span>Settings</span><i
                    class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="profile.html"><i class="fa fa-circle"></i>Profile
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="invoice.html"><i
                    data-feather="archive"></i><span>Invoice</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="forgot-password.html">
                    <i data-feather="key"></i>
                    <span>Forgot Password</span>
                </a>
            </li>
            --}}
            @if(Auth::user()->with('role')->first()->role->subscribe == 'aktif')
            <li>
                <a class="sidebar-header" href="{{ route('subcribe.list') }}">
                    <div style="display:flex; align-items: center">
                        <i data-feather="log-in"></i>
                        <span>Subscribe</span>
                    </div>
                </a>
            </li>
            @endif
            @if(Auth::user()->with('role')->first()->role->pesananList == 'aktif' || Auth::user()->with('role')->first()->role->pesananSumberList == 'aktif')
            <li>
                <a class="sidebar-header" href="javascript:void(0)" style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center;">
                        <i data-feather="box"></i>
                        <span>Pesanan</span>
                    </div>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    @if(Auth::user()->with('role')->first()->role->pesananList == 'aktif')
                    <li>
                        <a href="{{ route('pesanan.list') }}">
                            <i class="fa fa-circle"></i>
                            <span>List</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->with('role')->first()->role->pesananSumberList == 'aktif')
                    <li>
                        <a href="{{ route('pesanan.sumber.list') }}">
                            <i class="fa fa-circle"></i>
                            <span>Sumber</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>