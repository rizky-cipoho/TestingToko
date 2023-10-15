<x-guest-layout>
	<x-slot name="css">
		    <!-- Google font-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}}">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify-icons.css') }}">

    <!-- owlcarousel css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">

    <!-- Rating css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	</x-slot>
<div class="page-body">
    {{-- @dd($produk) --}}
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Product Detail
                                        <small>Multikart Admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i data-feather="home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Physical</li>
                                    <li class="breadcrumb-item active">Product Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="card">
                        <div class="row product-page-main card-body">
                            <div class="col-xl-4">
                                {{-- @dd($produk->image) --}}
                                <div class="product-slider owl-carousel owl-theme" id="sync1">
                                    @foreach($produk->image as $gambar)
                                    <div class="item"><img src="{{ asset($gambar->gambar) }}" alt="" class="blur-up lazyloaded"></div>
                                    @endforeach
                                </div>
                                <div class="owl-carousel owl-theme" id="sync2">
                                    @foreach($produk->image as $gambar)
                                    <div class="item"><img src="{{ asset($gambar->gambar) }}" alt="" class="blur-up lazyloaded"></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="product-page-details product-right mb-0">
                                    <h2>{{ $produk->judul_en }}</h2>
                                    <select id="u-rating-fontawesome-o" name="rating" data-current-rating="5"
                                        autocomplete="off">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <hr>
                                    <h6 class="product-title">product details</h6>
                                    <p>{{ $produk->deskripsi_en }}</p>
                                    <div class="product-price digits mt-2">
                                        <h3>$26.00 <del>$350.00</del></h3>
                                    </div>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                    <hr>
                                    <h6 class="product-title size-text">select size <span class="pull-right"><a href=""
                                                data-bs-toggle="modal" data-bs-target="#sizemodal">size chart</a></span>
                                    </h6>
                                    <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body"><img src="assets/images/size-chart.jpg" alt=""
                                                        class="img-fluid blur-up lazyloaded"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="size-box">
                                        <ul>
                                            @foreach($produk->ukuran as $ukuran)
                                            <li><a href="javascript:void(0)">{{ $ukuran->ukuran_en }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="add-product-form">
                                        <h6 class="product-title">quantity</h6>
                                        <fieldset class="qty-box mt-2 ms-0">
                                            <div class="input-group">
                                                <input class="touchspin" type="text" value="1">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <hr>
                                    <h6 class="product-title">Sales Ends In</h6>
                                    <div class="timer">
                                        <p id="demo"><span>25 <span class="padding-l">:</span> <span
                                                    class="timer-cal">Days</span> </span><span>22 <span
                                                    class="padding-l">:</span> <span class="timer-cal">Hrs</span>
                                            </span><span>13 <span class="padding-l">:</span> <span
                                                    class="timer-cal">Min</span> </span><span>57 <span
                                                    class="timer-cal">Sec</span></span>
                                        </p>
                                    </div>
                                    <div class="m-t-15">
                                        <button class="btn btn-primary m-r-10" type="button">Add To Cart</button>
                                        <button class="btn btn-secondary" type="button">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
 <x-slot name="js">
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- Touchspin Js-->
    <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>

    <!-- Rating Js-->
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>

    <!-- Owlcarousel js-->
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/product-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
 </x-slot>
</x-guest-layout>