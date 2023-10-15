<x-guest-layout>
    <x-slot name="css">
    <link rel="icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">

    <!-- Google font-->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify-icons.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</x-slot>
 <div class="page-body">
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>Product List
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
    <li class="breadcrumb-item active">Product List</li>
</ol>
</div>
</div>
</div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row products-admin ratio_asos">
      @foreach($produks as $produk)
      <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body product-box">
                <div class="img-wrapper">
                    <div class="front">
                        <a href="javascript:void(0)"><img src="{{ $produk->gambar }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        <div class="product-hover">
                            <ul>
                                @if(Auth::user()->with('role')->first()->role->produkEdit == 'aktif')
                                <li>
                                    <a href="{{ route('produk.edit', $produk->id) }}">
                                        <button class="btn" type="button" data-original-title=""
                                    title=""><i class="ti-pencil-alt"></i></button>
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->with('role')->first()->role->produkDelete == 'aktif')
                                <li>
                                <form action="{{ route('produk.delete.proses', $produk->id) }}" method="post">
                                    @csrf
                                    <button class="btn"><i class="ti-trash"></i></button>
                                </form>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product-detail" >
                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                        class="fa fa-star"></i></div>
                        <a href="{{ route('produk.detail', $produk->id) }}">
                            <h6>{{ $produk->judul_en }}</h6>
                        </a>
                        @if($produk->diskon_en == 0)
                        <h4 id="ori{{ $produk->id }}"></h4>
                        @else
                        <div style="display: flex;">
                            <h4 id="dis{{ $produk->id }}"></h4>
                            <h4><del id="ori{{ $produk->id }}"></del></h4>
                        </div>
                        @endif
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<script type="text/javascript">
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });
    function convertDollar(price, id){
        document.getElementById(id).innerHTML = formatter.format(price);
    }
    function discon(id, price, discon){
        // console.log("asdasd")
        let total = price-(price*discon)/100;
        convertDollar(total, id);
    }
</script>
@foreach($produks as $produk)
@if($produk->diskon_en == 0)
<script type="text/javascript">
    convertDollar('{{ $produk->harga_en }}', 'ori{{ $produk->id }}');
</script>
@else
<script type="text/javascript">
    convertDollar('{{ $produk->harga_en }}', 'ori{{ $produk->id }}');
    discon('dis{{ $produk->id }}', '{{ $produk->harga_en }}', '{{ $produk->diskon_en }}');
</script>
@endif
@endforeach
<x-slot name="js">
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>


    <!--Customizer admin-->
    <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>

    <!--right sidebar js-->
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>


    <!-- lazyload js-->
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

    <!--script admin-->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
</x-slot>
</x-guest-layout>