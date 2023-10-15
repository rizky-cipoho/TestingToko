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
                            <h3>User List
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
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">User List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search.."><span
                            class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                        </div>
                    </form>
                    @if(Auth::user()->with('role')->first()->role->userCreate == 'aktif')

                    <a href="{{ route('user.create') }}" class="btn btn-primary mt-md-0 mt-2">Create User</a>
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
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr data-row-id="1">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                        id="flexCheckDefault" data-id="1">
                                    </td>
                                    <td>
                                        <div  style="display:flex; justify-content:center">
                                            <img src="{{ asset($user->image) }}" alt="">  
                                        </div>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role->role }}</td>
                                    <td>
                    @if(Auth::user()->with('role')->first()->role->userEdit == 'aktif')
                                        <a style="cursor: pointer;" href="{{ route('profile.detail', $user->id) }}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
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
    <script src="{{ asset('assets/js/table-row-delete.js') }}"></script>
    
    <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
    </x-slot>
</x-guest-layout>