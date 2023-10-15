<x-guest-layout>
	<x-slot name="css">

		<link rel="icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">

        <!-- Google font-->
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    </x-slot>
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>List Page
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
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">List Page</li>
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
                    @if(Auth::user()->with('role')->first()->role->pageCreate == 'aktif')

                            <a href="{{ route('page.add') }}" class="btn btn-primary mt-md-0 mt-2">Add New Page</a>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-desi">
                                <table class="all-package coupon-table table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <button type="button"
                                                class="btn btn-primary add-row delete_all">Delete</button>
                                            </th>
                                            <th>Judul ID</th>
                                            <th>Judul EN</th>
                                            <th>Status</th>
                                            <th>Kategori Id</th>
                                            <th>Kategori EN</th>
                                            <th>Tanggal Buat</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       @foreach($pages as $page)
                                       {{-- @dd($page) --}}
                                       <tr data-row-id="1">
                                        <td>
                                            <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault" data-id="1">
                                        </td>
                                        <td>{{ $page->judul_id }}</td>
                                        <td>{{ $page->judul_en }}</td>
                                        <td>{{ $page->status }}</td>
                                        <td>{{ $page->Kategori->kategori_id }}</td>
                                        <td>{{ $page->Kategori->kategori_en }}</td>
                                        <td>{{ $page->created_at }}</td>
                                        <td>
                    @if(Auth::user()->with('role')->first()->role->pageEdit == 'aktif')

                                            <a href="{{ route('page.edit', $page->id) }}">edit</a>
                                            @endif
                                        </td>
                                        <td>
                    @if(Auth::user()->with('role')->first()->role->pageDelete == 'aktif')
                                            <form method="post" action="{{ route('page.delete.proses', $page->id) }}">
                                                @csrf
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
<x-slot name="js">
 <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

 <!-- Bootstrap js-->
 <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

 <!-- feather icon js-->
 <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
 <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

 <!-- Sidebar jquery-->
 <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
 <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
 <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>
 <script src="{{ asset('assets/js/admin-script.js') }}"></script>
 <script src="{{ asset('assets/js/table-row-delete.js') }}"></script>
 <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
</x-slot>
</x-guest-layout>