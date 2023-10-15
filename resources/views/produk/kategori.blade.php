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
    </x-slot>
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Category
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
        @if(Auth::user()->with('role')->first()->produkKategoriCreate)

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
                                            <th>Kategori ID</th>
                                            <th>Kategori EN</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($kategoris as $index=>$kategori)
                                        {{-- @dd(1 == true) --}}
                                        <tr>
                                            <td data-field="price">{{ $index+1 }}</td>
                                            <td data-field="name">{{ $kategori->kategori_id }}</td>
                                            <td data-field="name">{{ $kategori->kategori_en }}</td>

                                            <td class="order-success" data-field="status">
                                                <span>{{ !$kategori->status ? "Aktif" : "Tidak Aktif" }}</span>
                                            </td>

                                            <td style="display:flex; justify-content:center">
                                                @if(Auth::user()->with('role')->first()->produkKategoriEdit)

                                                <a data-bs-target="#editModal" data-bs-toggle="modal" data-original-title="test" onclick="datasModal({{ $kategori }}, '{{ route("produk.kategori.edit.proses", $kategori->id) }}')">
                                                    <i class="fa fa-edit" title="Edit"></i>
                                                </a>
                                                @endif
                                                
                                            @if(Auth::user()->with('role')->first()->produkKategoriDelete)

                                                <form method="post" action="{{ route('produk.kategori.delete.proses') }}">
                                                    @csrf
                                                    <input type="text" name="id" style="display:none" value="{{ $kategori->id }}">
                                                    <button>
                                                        <a>
                                                            <i class="fa fa-trash" title="Delete"></i>
                                                        </a>
                                                    </button>
                                                </form>
                                                @endif
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
        @if(Auth::user()->with('role')->first()->produkKategoriCreate)
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Physical Product</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
                </div>
                <form class="needs-validation" method="POST" action="{{ route('produk.kategori.add.proses') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Kategori ID :</label>
                                <input class="form-control" name="kategori_id" id="validationCustom01" type="text" required>
{{--                                 @error('kategori_id')
                                {{ $message }}
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Kategori EN :</label>
                                <input class="form-control" name="kategori_en" id="validationCustom01" type="text" required>
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">Satus :</label>
                                <select class="form-control" name="status" required>
                                    <option value="0"> Aktif</option>
                                    <option value="1"> Tidak Aktif</option>
                                </select>
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
    @endif
        @if(Auth::user()->with('role')->first()->produkKategoriEdit)
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Physical Product</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
                </div>
                <form class="needs-validation" method="POST" action="" id="kategoriForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Kategori ID :</label>
                                <input class="form-control" name="kategori_id" id="kategoriId" type="text" required>
{{--                                 @error('kategori_id')
                                {{ $message }}
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Kategori EN :</label>
                                <input class="form-control" name="kategori_en" id="kategoriEn"
 type="text" required>
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">Satus :</label>
                                <select class="form-control" id="" name="status" required>
                                    <option value="0" id="statusKategori0"> Aktif</option>
                                    <option value="1" id="statusKategori1"> Tidak Aktif</option>
                                </select>
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
    @endif
    <script type="text/javascript">
        let datas = [];
        // let route = 
        function datasModal(data, route){
            datas = data;
            document.getElementById('kategoriId').value = datas.kategori_id;
            document.getElementById('kategoriEn').value = datas.kategori_en;
            
            document.getElementById('kategoriForm').action = route;
            if(datas.status == 0){
                document.getElementById('statusKategori0').setAttribute('selected');
            }else{
                document.getElementById('statusKategori1').setAttribute('selected');
            }
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