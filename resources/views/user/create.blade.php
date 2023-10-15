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
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Create User
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
                            <li class="breadcrumb-item">Users </li>
                            <li class="breadcrumb-item active">Create User </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                    data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                    aria-selected="true" data-original-title="" title="">Account</a></li>
                                    <li class="nav-item"><a class="nav-link" id="permission-tabs"
                                        data-bs-toggle="tab" href="#permission" role="tab"
                                        aria-controls="permission" aria-selected="false" data-original-title=""
                                        title="">Permission</a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                                        aria-labelledby="account-tab">
                                        <form class="needs-validation user-add" action="{{ route('user.create.proses') }}" method="post" autocomplete="off">
                                            @csrf
                                            <h4>Account Details</h4>
                                            <div class="form-group row">
                                                <label for="validationCustom0"
                                                class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom0" type="text"
                                                    required
                                                    value="{{ old('name') }}"
                                                    autocomplete="off"
                                                    name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom1"
                                                class="col-xl-3 col-md-4"><span>*</span>Username</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text"
                                                    required
                                                    value="{{ old('username') }}"
                                                    name="username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom2"
                                                class="col-xl-3 col-md-4"><span>*</span>Email</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom2" type="email"
                                                    value="{{ old('email') }}"
                                                    autocomplete="off"
                                                    name="email"
                                                    required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom2"
                                                class="col-xl-3 col-md-4"><span>*</span>Jenis Kelamin</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="jk1" autocomplete="off" type="radio"
                                                    name="jenis_kelamin"
                                                    value="laki-laki"
                                                    {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}
                                                    >
                                                    <label for="jk1">Laki-laki</label>
                                                    <input class="form-control" autocomplete="off" id="jk2" type="radio"
                                                    name="jenis_kelamin"
                                                    {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}
                                                    value="perempuan">
                                                    <label for="jk2">Perempuan</label>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom2"
                                                class="col-xl-3 col-md-4"><span>*</span>Role</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <select name="role" autocomplete="off" required>
                                                        <option>-- Choice --</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" 
                                                            {{ old('role') == $role->id  ? 'selected' : '' }}>{{ $role->role }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom3"
                                                class="col-xl-3 col-md-4"><span>*</span> Password</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" autocomplete="off"
                                                    type="password" id="password" name="password" value="{{ old('password') }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> Confirm
                                            Password</label>
                                            
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" autocomplete="off"
                                                type="password" id="confirm_password" name="password_confirmation" required>
                                                @error('password')
                                            {{ $message }}
                                            @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex; justify-content: right;">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>                                        
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="permission" role="tabpanel"
                                aria-labelledby="permission-tabs">
                                <form class="needs-validation user-add" novalidate="">
                                    <div class="permission-block">
                                        <div class="attribute-blocks">
                                            <h5 class="f-w-600 mb-3">Product Related permition </h5>
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label>Add Product</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div
                                                    class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                    <label class="d-block" for="edo-ani1">
                                                        <input class="radio_animated" id="edo-ani1"
                                                        type="radio" name="rdo-ani">
                                                        Allow
                                                    </label>
                                                    <label class="d-block" for="edo-ani2">
                                                        <input class="radio_animated" id="edo-ani2"
                                                        type="radio" name="rdo-ani" checked="">
                                                        Deny
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-4">
                                                <label>Update Product</label>
                                            </div>
                                            <div class="col-xl-9 col-sm-8">
                                                <div
                                                class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                <label class="d-block" for="edo-ani3">
                                                    <input class="radio_animated" id="edo-ani3"
                                                    type="radio" name="rdo-ani1">
                                                    Allow
                                                </label>
                                                <label class="d-block" for="edo-ani4">
                                                    <input class="radio_animated" id="edo-ani4"
                                                    type="radio" name="rdo-ani1" checked="">
                                                    Deny
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-4">
                                            <label>Delete Product</label>
                                        </div>
                                        <div class="col-xl-9 col-sm-8">
                                            <div
                                            class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani5">
                                                <input class="radio_animated" id="edo-ani5"
                                                type="radio" name="rdo-ani2">
                                                Allow
                                            </label>
                                            <label class="d-block" for="edo-ani6">
                                                <input class="radio_animated" id="edo-ani6"
                                                type="radio" name="rdo-ani2" checked="">
                                                Deny
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                        <label class="mb-0 sm-label-radio">Apply
                                        discount</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                        <div
                                        class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                        <label class="d-block mb-0" for="edo-ani7">
                                            <input class="radio_animated" id="edo-ani7"
                                            type="radio" name="rdo-ani3">
                                            Allow
                                        </label>
                                        <label class="d-block mb-0" for="edo-ani8">
                                            <input class="radio_animated" id="edo-ani8"
                                            type="radio" name="rdo-ani3" checked="">
                                            Deny
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="attribute-blocks">
                            <h5 class="f-w-600 mb-3">Category Related permition </h5>
                            <div class="row">
                                <div class="col-xl-3 col-sm-4">
                                    <label>Add Category</label>
                                </div>
                                <div class="col-xl-9 col-sm-8">
                                    <div
                                    class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block" for="edo-ani9">
                                        <input class="radio_animated" id="edo-ani9"
                                        type="radio" name="rdo-ani4">
                                        Allow
                                    </label>
                                    <label class="d-block" for="edo-ani10">
                                        <input class="radio_animated" id="edo-ani10"
                                        type="radio" name="rdo-ani4" checked="">
                                        Deny
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-sm-4">
                                <label>Update Category</label>
                            </div>
                            <div class="col-xl-9 col-sm-8">
                                <div
                                class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                <label class="d-block" for="edo-ani11">
                                    <input class="radio_animated" id="edo-ani11"
                                    type="radio" name="rdo-ani5">
                                    Allow
                                </label>
                                <label class="d-block" for="edo-ani12">
                                    <input class="radio_animated" id="edo-ani12"
                                    type="radio" name="rdo-ani5" checked="">
                                    Deny
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-4">
                            <label>Delete Category</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                            <div
                            class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani13">
                                <input class="radio_animated" id="edo-ani13"
                                type="radio" name="rdo-ani6">
                                Allow
                            </label>
                            <label class="d-block" for="edo-ani14">
                                <input class="radio_animated" id="edo-ani14"
                                type="radio" name="rdo-ani6" checked="">
                                Deny
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-4">
                        <label class="mb-0 sm-label-radio">Apply
                        discount</label>
                    </div>
                    <div class="col-xl-9 col-sm-8">
                        <div
                        class="form-group m-checkbox-inline custom-radio-ml d-flex radio-animated pb-0">
                        <label class="d-block mb-0" for="edo-ani15">
                            <input class="radio_animated" id="edo-ani15"
                            type="radio" name="rdo-ani7">
                            Allow
                        </label>
                        <label class="d-block mb-0" for="edo-ani16">
                            <input class="radio_animated" id="edo-ani16"
                            type="radio" name="rdo-ani7" checked="">
                            Deny
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
<div class="pull-right">
</div>
</div>
</div>
</div>
</div>
</div>
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
  <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>
  <script src="{{ asset('assets/js/edit-delete-new-product.js') }}"></script>
  <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
  <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
  <script src="{{ asset('assets/js/admin-script.js') }}"></script>
</x-slot>
</x-guest-layout>