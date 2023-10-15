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
                    <div class="card-header">
                        <form class="form-inline search-form search-box">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Search..">
                            </div>
                        </form>
                    @if(Auth::user()->with('role')->first()->role->pesananCreate == 'aktif')

                        <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Sub
                        Category</button>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>
                                            <p>Produk</p>
                                            <small>ID</small>
                                            <small>EN</small>
                                        </th>
                                        <th>QTY</th>
                                        <th>Sumber</th>
                                        <th>Nomor Telepon</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($pesanans as $index=>$pesanan)
                                    {{-- @dd($pesanan) --}}
                                    <tr>
                                        <td data-field="price">{{ $index+1 }}</td>
                                        <td data-field="name">{{ $pesanan->nama }}</td>
                                        <td data-field="name">{{ $pesanan->produk->judul_id }}/{{ $pesanan->produk->judul_en }}</td>
                                        <td data-field="name">{{ $pesanan->qty }}</td>
                                        <td data-field="name">{{ $pesanan->sumber->sumber }}</td>
                                        <td data-field="name">{{ $pesanan->telepon }}</td>
                                        <td data-field="name">{{ $pesanan->status }}</td>
                                        <td style="display:flex; justify-content:center">
                    @if(Auth::user()->with('role')->first()->role->pesananEdit == 'aktif')

                                            <a data-bs-target="#editModal" data-bs-toggle="modal" data-original-title="test" onclick="datasModal({{ $pesanan }}, '{{ route("pesanan.edit.proses", $pesanan->id) }}',{{ $produks }}, {{ $sumbers }})">
                                                <i class="fa fa-edit" title="Edit"></i>
                                            </a>
                                            @endif
                    @if(Auth::user()->with('role')->first()->role->pesananDelete == 'aktif')

                                            <form method="post" action="{{ route('pesanan.delete.proses', $pesanan->id) }}">
                                                @csrf
                                                <button>
                                                    <a>
                                                        <i class="fa fa-trash" title="Delete"></i>
                                                    </a>
                                                </button>
                                            </form>
                                            @endif
                                            <a href="{{ route('pesanan.detail', $pesanan->id) }}">
                                                <i class="fa fa-eye" title="Edit"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Role</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">×</span></button>
            </div>
            <form class="needs-validation" method="POST" action="{{ route('pesanan.add.proses') }}">
                @csrf
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Nama Pemesan :</label>
                            <input class="form-control" name="nama" id="validationCustom01" type="text" required>
                            <label for="validationCustom01" class="mb-1">Produk :</label>
                            <select name="produk" class="form-control">
                                <option>-- Pilih --</option>
                                @foreach($produks as $produk)
                                <option value="{{ $produk->id }}">Produk ID: {{ $produk->judul_id }} / Produk EN: {{ $produk->judul_en }}</option>
                                @endforeach
                            </select>
                            <label for="validationCustom01" class="mb-1">Sumber :</label>
                            <select name="sumber" class="form-control">
                                <option>-- Pilih --</option>
                                @foreach($sumbers as $sumber)
                                <option value="{{ $sumber->id }}">{{ $sumber->sumber }}</option>
                                @endforeach
                            </select>
                            <label for="validationCustom01" class="mb-1">QTY :</label>
                            <input class="form-control" name="qty" id="validationCustom01" type="number" required>
                            <label for="validationCustom01" class="mb-1">Nomor Telepon :</label>
                            <input class="form-control" name="telepon" id="validationCustom01" type="text" required>
                            <label for="validationCustom01" class="mb-1">Alamat :</label>
                            <textarea class="form-control" name="alamat" required></textarea>
                            <label for="validationCustom01" class="mb-1">Status :</label>
                            <select name="status" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Diterima">Diterima</option>
                            </select>
                            <label for="validationCustom01" class="mb-1">Deskripsi :</label>
                            <textarea class="form-control"name="deskripsi"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" name="simpan" type="submit" >Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Pesanan</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">×</span></button>
            </div>
            <form class="needs-validation" method="POST" action="" id="formUpdate">
                @csrf
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1" >Nama Pemesan :</label>
                            <input class="form-control" name="nama" id="nama" type="text" required>
                            <label for="validationCustom01" class="mb-1">Produk :</label>
                            <select name="produk" class="form-control" id="produkSelected">
                                <option>-- Pilih --</option>
                                @foreach($produks as $produk)
                                <option value="{{ $produk->id }}" id="{{ $produk->id }}">Produk ID: {{ $produk->judul_id }} / Produk EN: {{ $produk->judul_en }}</option>
                                @endforeach
                            </select>
                            <select name="sumber" class="form-control">
                                <option>-- Pilih --</option>
                                @foreach($sumbers as $sumber)
                                <option value="{{ $sumber->id }}" id="{{ $sumber->id }}">{{ $sumber->sumber }}</option>
                                @endforeach
                            </select>
                            <label for="validationCustom01" class="mb-1">QTY :</label>
                            <input class="form-control" name="qty" id="qty" type="number" required>
                            <label for="validationCustom01" class="mb-1">Nomor Telepon :</label>
                            <input class="form-control" name="telepon" id="telepon" type="text" required>
                            <label for="validationCustom01" class="mb-1">Alamat :</label>
                            <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                            <label for="validationCustom01" class="mb-1">Status :</label>
                            <select name="status" class="form-control">
                                <option value="pending" id="pending">Pending</option>
                                <option value="Dikirim" id="Dikirim">Dikirim</option>
                                <option value="Diterima" id="Diterima">Diterima</option>
                            </select>
                            <label for="validationCustom01" class="mb-1">Deskripsi :</label>
                            <textarea class="form-control"name="deskripsi" id="deskripsi"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" name="simpan" type="submit" >Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    let datas = [];
        // let route = 
    function datasModal(data, route, produks, sumber){
        // console.log(data)
        document.getElementById('nama').value = data.nama;
        document.getElementById('qty').value = data.qty;
        document.getElementById('alamat').innerHTML = data.alamat;
        document.getElementById('telepon').innerHTML = data.telepon;
        document.getElementById(data.status).setAttribute('selected', '');
        document.getElementById('deskripsi').innerHTML = data.deskripsi == undefined ? '' : data.deskripsi;
        document.getElementById('formUpdate').action = route;
        produks.forEach((produk)=>{
         if(data.produk_id == produk.id){
            document.getElementById(produk.id).setAttribute('selected', '');
        }
        sumber.forEach((sumber)=>{
         if(data.sumber_id == sumber.id){
            document.getElementById(sumber.id).setAttribute('selected', '');
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