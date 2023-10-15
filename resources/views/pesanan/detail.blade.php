<x-guest-layout>
    <x-slot name="css">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}}">
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <style type="text/css">
            td {
              text-align: center;
          }
          th {
              text-align: center;
          }
      </style>
  </x-slot>
  <div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>List Pesanan
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                {{-- alert success --}}
                {{-- @if(session('success')) --}}
                {{-- <div>{{session('success')}}</div> --}}
                {{-- @endif --}}
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Sub Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <form action="{{ route('pesanan.status.proses', $detail->id) }}" method="post">
                                    @csrf
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td>{{ $detail->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>produk</th>
                                            <th>:</th>
                                            <td>{{ $detail->produk->judul_id }}/{{ $detail->produk->judul_en }}</td>
                                        </tr>
                                        <tr>
                                            <th>QTY</th>
                                            <th>:</th>
                                            <td>{{ $detail->qty }}</td>
                                        </tr>
                                        <tr>
                                            <th>pesanan</th>
                                            <th>:</th>
                                            <td>
                                                <select name="status" class="form-control">
                                                    <option value="pending">pending</option>
                                                    <option value="Dikirim">Dikirim</option>
                                                    <option value="Diterima">Diterima</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>:</th>
                                            <td><p>{{ $detail->alamat }}</p></td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Telepon</th>
                                            <th>:</th>
                                            <td><p>{{ $detail->telepon }}</p></td>
                                        </tr>
                                        <tr>
                                            <th>sumber</th>
                                            <th>:</th>
                                            <td><p>{{ $detail->sumber->sumber }}</p></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>:</th>
                                            <td><p>{{ $detail->deskripsi }}</p></td>
                                        </tr>
                                        <tr>
                                            <th>Sumber</th>
                                            <th>:</th>
                                            <td><p>Shopee</p></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <td><button class="btn btn-primary">Ubah Status</button></td>
                                        </tr>
                                    </tbody>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<script type="text/javascript">
    let datas = [];
        // let route = 
    function datasModal(data, route, produks){
        // console.log(data)
        document.getElementById('nama').value = data.nama;
        document.getElementById('qty').value = data.qty;
        document.getElementById('alamat').innerHTML = data.alamat;
        document.getElementById(data.status).setAttribute('selected', '');
        document.getElementById('deskripsi').innerHTML = data.deskripsi == undefined ? '' : data.deskripsi;
        document.getElementById('formUpdate').action = route;
        produks.forEach((produk)=>{
         if(data.produk_id == produk.id){
            document.getElementById(produk.id).setAttribute('selected', '');
        }
    })
    }
</script>
<x-slot name="js">
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/edit-delete-new-product.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
</x-slot>
</x-guest-layout>