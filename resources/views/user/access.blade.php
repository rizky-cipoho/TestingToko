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
                    @if(Auth::user()->with('role')->first()->role->user_aksesCreate == 'aktif')

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
                      <th>Role</th>
                      <th>
                        <p>User</p>
                        <small>List</small>
                        <small>Create</small>
                        <small>Edit</small>
                      </th>
                      <th>
                        <p>Produk</p>
                        <small>List</small>
                        <small>Create</small>
                        <small>Edit</small>
                        <small>Delete</small>
                      </th>
                      <th>
                        <p>Produk Kategori</p>
                        <small>List</small>
                        <small>Create</small>
                        <small>Edit</small>
                        <small>Delete</small>
                      </th>
                      <th>
                       <p>Hak Akses</p>
                       <small>List</small>
                       <small>Create</small>
                       <small>Edit</small>
                       <small>Delete</small>
                     </th>
                     <th>
                       <p>Slider</p>
                       <small>List</small>
                       <small>Create</small>
                       <small>Edit</small>
                       <small>Delete</small>
                     </th>
                     <th>
                       <p>Banner</p>
                       <small>List</small>
                       <small>Create</small>
                       <small>Edit</small>
                       <small>Delete</small>
                     </th>
                     <th>
                      <p>Page</p>
                      <small>List</small>
                      <small>Create</small>
                      <small>Edit</small>
                      <small>Delete</small>
                    </th>
                    <th>
                     <p>Page Kategori</p>
                     <small>List</small>
                     <small>Create</small>
                     <small>Edit</small>
                     <small>Delete</small>
                   </th>
                   <th>
                     <p>Pesanan</p>
                     <small>List</small>
                     <small>Create</small>
                     <small>Edit</small>
                     <small>Delete</small>
                   </th>
                   <th>
                     <p>Sumber Pesanan</p>
                     <small>List</small>
                     <small>Create</small>
                     <small>Edit</small>
                     <small>Delete</small>
                   </th>
                   <th>
                     <p>Subscribe</p>
                   </th>
                   <th></th>
                 </tr>
               </thead>

               <tbody>
                @foreach($roles as $index=>$role)
                {{-- @dd(1 == true) --}}
                <tr>
                  <td data-field="price">{{ $index+1 }}</td>
                  <td data-field="name">{{ $role->role }}</td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->userList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->userCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->userEdit == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->produkList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->produkCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->produkEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->produkDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->produkKategoriList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->produkKategoriCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->produkKategoriEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->produkKategoriDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->user_aksesList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->user_aksesCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->user_aksesEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->user_aksesDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->sliderList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->sliderCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->sliderEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->sliderDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->bannerList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->bannerCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->bannerEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->bannerDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->pageList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pageCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pageEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pageDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->pageKategoriList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pageKategoriCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pageKategoriEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pageKategoriDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->pesananList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pesananCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pesananEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pesananDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->pesananSumberList == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pesananSumberCreate == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pesananSumberEdit == 'aktif') checked  @endif disabled>
                    <input type="checkbox" name="" @if($role->pesananSumberDelete == 'aktif') checked  @endif disabled>
                  </td>
                  <td class="order-success" data-field="status">
                    <input type="checkbox" name="" @if($role->subscribe == 'aktif') checked  @endif disabled>
                  </td>

                  <td style="display:flex; justify-content:center">
                    @if(Auth::user()->with('role')->first()->role->user_aksesEdit == 'aktif')

                    <a data-bs-target="#editModal" data-bs-toggle="modal" data-original-title="test" onclick="datasModal({{ $role }}, '{{ route("user.role.edit.proses", $role->id) }}')">
                      <i class="fa fa-edit" title="Edit"></i>
                    </a>
@endif
                    @if(Auth::user()->with('role')->first()->role->user_aksesDelete == 'aktif')

                    <form method="post" action="{{ route('user.role.delete.proses', $role->id) }}">
                      @csrf
                      <input type="text" name="id" style="display:none" value="{{ $role->id }}">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Role</h5>
      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
        aria-hidden="true">×</span></button>
      </div>
      <form class="needs-validation" method="POST" action="{{ route('user.role.add.proses') }}">
        @csrf
        <div class="modal-body">
          <div class="form">
            <div class="form-group">
              <label for="validationCustom01" class="mb-1">Nama Role :</label>
              <input class="form-control" name="role" id="validationCustom01" type="text" required>

            </div>
            <div class="form-group" style="">
              <p for="validationCustom01" class="mb-1">Role :</p>
              <div class="center-second-column">
                <table class="table">
                  <thead>
                    <tr>
                      <th> </th>
                      <th>List</th>
                      <th>Create</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>User</th>
                      <td ><input class="form-control" name="userList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="userCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="userEdit" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Role</th>
                      <td ><input class="form-control" name="user_aksesList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="user_aksesCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="user_aksesEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="user_aksesDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Produk</th>
                      <td ><input class="form-control" name="produkList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="produkCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Produk Kategori</th>
                      <td ><input class="form-control" name="produkKategoriList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="produkKategoriCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkKategoriEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkKategoriDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Slider</th>
                      <td ><input class="form-control" name="sliderList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="sliderCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="sliderEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="sliderDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Banner</th>
                      <td ><input class="form-control" name="bannerList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="bannerCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="bannerEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="bannerDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Page</th>
                      <td ><input class="form-control" name="pageList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pageCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>page Kategori</th>
                      <td ><input class="form-control" name="pageKategoriList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pageKategoriCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageKategoriEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageKategoriDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Pesanan</th>
                      <td ><input class="form-control" name="pesananList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pesananCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Sumber Pesanan</th>
                      <td ><input class="form-control" name="pesananSumberList" id="" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pesananSumberCreate" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananSumberEdit" id="" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananSumberDelete" id="" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Subscribe</th>
                      <td ><input class="form-control" name="Subscribe" id="" type="checkbox" value="aktif"></td>
                    </tr>
                </tbody>
              </table>
            </div>
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
      <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Physical Product</h5>
      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
        aria-hidden="true">×</span></button>
      </div>
      <form class="needs-validation" method="POST" action="" id="formUpdate">
        @csrf
        <div class="modal-body">
          <div class="form">
            <div class="form-group" style="">
              <label for="validationCustom01" class="mb-1">Nama Role :</label>
              <input class="form-control" name="role" id="role" type="text" required>
              <div class="center-second-column">
                <table class="table">
                  <thead>
                    <tr>
                      <th> </th>
                      <th>List</th>
                      <th>Create</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>User</th>
                      <td ><input class="form-control" name="userList" id="userList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="userCreate" id="userCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="userEdit" id="userEdit" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Role</th>
                      <td ><input class="form-control" name="user_aksesList" id="user_aksesList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="user_aksesCreate" id="user_aksesCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="user_aksesEdit" id="user_aksesEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="user_aksesDelete" id="user_aksesDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Produk</th>
                      <td ><input class="form-control" name="produkList" id="produkList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="produkCreate" id="produkCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkEdit" id="produkEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkDelete" id="produkDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Produk Kategori</th>
                      <td ><input class="form-control" name="produkKategoriList" id="produkKategoriList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="produkKategoriCreate" id="produkKategoriCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkKategoriEdit" id="produkKategoriEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="produkKategoriDelete" id="produkKategoriDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Slider</th>
                      <td ><input class="form-control" name="sliderList" id="sliderList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="sliderCreate" id="sliderCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="sliderEdit" id="sliderEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="sliderDelete" id="sliderDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Banner</th>
                      <td ><input class="form-control" name="bannerList" id="bannerList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="bannerCreate" id="bannerCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="bannerEdit" id="bannerEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="bannerDelete" id="bannerDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Page</th>
                      <td ><input class="form-control" name="pageList" id="pageList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pageCreate" id="pageCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageEdit" id="pageEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageDelete" id="pageDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>page Kategori</th>
                      <td ><input class="form-control" name="pageKategoriList" id="pageKategoriList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pageKategoriCreate" id="pageKategoriCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageKategoriEdit" id="pageKategoriEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pageKategoriDelete" id="pageKategoriDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Pesanan</th>
                      <td ><input class="form-control" name="pesananList" id="pesananList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pesananCreate" id="pesananCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananEdit" id="pesananEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananDelete" id="pesananDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Sumber Pesanan</th>
                      <td ><input class="form-control" name="pesananSumberList" id="pesananSumberList" type="checkbox" value="aktif"></td>
                      <td><input class="form-control" name="pesananSumberCreate" id="pesananSumberCreate" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananSumberEdit" id="pesananSumberEdit" type="checkbox" value="aktif"></td>
                      <td ><input class="form-control" name="pesananSumberDelete" id="pesananSumberDelete" type="checkbox" value="aktif"></td>
                    </tr>
                    <tr>
                      <th>Subscribe</th>
                      <td ><input class="form-control" name="subscribe" id="subscribe" type="checkbox" value="aktif"></td>
                    </tr>
                </tbody>
              </table>
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
  function datasModal(data, route){
    document.getElementById('role').value = data.role;
    document.getElementById('formUpdate').action = route;
    if(data.userCreate == 'aktif'){
      document.getElementById('userCreate').setAttribute('checked', '');
    }else{
      document.getElementById('userCreate').removeAttribute('checked');
    }
    if(data.userEdit == 'aktif'){
      document.getElementById('userEdit').setAttribute('checked', '');
    }else{
      document.getElementById('userEdit').removeAttribute('checked');
    }
    if(data.userList == 'aktif'){
      document.getElementById('userList').setAttribute('checked', '');
    }else{
      document.getElementById('userList').removeAttribute('checked');
    }

    if(data.produkCreate == 'aktif'){
      document.getElementById('produkCreate').setAttribute('checked', '');
    }else{
      document.getElementById('produkCreate').removeAttribute('checked');
    }
    if(data.produkEdit == 'aktif'){
      document.getElementById('produkEdit').setAttribute('checked', '');
    }else{
      document.getElementById('produkEdit').removeAttribute('checked');
    }
    if(data.produkList == 'aktif'){
      document.getElementById('produkList').setAttribute('checked', '');
    }else{
      document.getElementById('produkList').removeAttribute('checked');
    }
    if(data.produkDelete == 'aktif'){
        document.getElementById('produkDelete').setAttribute('checked', '');
    }else{
      document.getElementById('produkDelete').removeAttribute('checked');
    }

    if(data.produkKategoriCreate == 'aktif'){
      document.getElementById('produkKategoriCreate').setAttribute('checked', '');
    }else{
      document.getElementById('produkKategoriCreate').removeAttribute('checked');
    }
    if(data.produkKategoriEdit == 'aktif'){
      document.getElementById('produkKategoriEdit').setAttribute('checked', '');
    }else{
      document.getElementById('produkKategoriEdit').removeAttribute('checked');
    }
    if(data.produkKategoriList == 'aktif'){
      document.getElementById('produkKategoriList').setAttribute('checked', '');
    }else{
      document.getElementById('produkKategoriList').removeAttribute('checked');
    }
    if(data.produkKategoriDelete == 'aktif'){
        document.getElementById('produkKategoriDelete').setAttribute('checked', '');
    }else{
      document.getElementById('produkKategoriDelete').removeAttribute('checked');
    }


    if(data.user_aksesCreate == 'aktif'){
      document.getElementById('user_aksesCreate').setAttribute('checked', '');
    }else{
      document.getElementById('user_aksesCreate').removeAttribute('checked');
    }
    if(data.user_aksesEdit == 'aktif'){
      document.getElementById('user_aksesEdit').setAttribute('checked', '');
    }else{
      document.getElementById('user_aksesEdit').removeAttribute('checked');
    }
    if(data.user_aksesList == 'aktif'){
      document.getElementById('user_aksesList').setAttribute('checked', '');
    }else{
      document.getElementById('user_aksesList').removeAttribute('checked');
    }
    if(data.user_aksesDelete == 'aktif'){
      document.getElementById('user_aksesDelete').setAttribute('checked', '');
    }else{
      document.getElementById('user_aksesDelete').removeAttribute('checked');
    }

    if(data.sliderCreate == 'aktif'){
      document.getElementById('sliderCreate').setAttribute('checked', '');
    }else{
      document.getElementById('sliderCreate').removeAttribute('checked');
    }
    if(data.sliderEdit == 'aktif'){
      document.getElementById('sliderEdit').setAttribute('checked', '');
    }else{
      document.getElementById('sliderEdit').removeAttribute('checked');
    }
    if(data.sliderList == 'aktif'){
      document.getElementById('sliderList').setAttribute('checked', '');
    }else{
      document.getElementById('sliderList').removeAttribute('checked');
    }
    if(data.sliderDelete == 'aktif'){
      document.getElementById('sliderDelete').setAttribute('checked', '');
    }else{
      document.getElementById('sliderDelete').removeAttribute('checked');
    }

    if(data.bannerCreate == 'aktif'){
      document.getElementById('bannerCreate').setAttribute('checked', '');
    }else{
      document.getElementById('bannerCreate').removeAttribute('checked');
    }
    if(data.bannerEdit == 'aktif'){
      document.getElementById('bannerEdit').setAttribute('checked', '');
    }else{
      document.getElementById('bannerEdit').removeAttribute('checked');
    }
    if(data.bannerList == 'aktif'){
      document.getElementById('bannerList').setAttribute('checked', '');
    }else{
      document.getElementById('bannerList').removeAttribute('checked');
    }
    if(data.bannerDelete == 'aktif'){
      document.getElementById('bannerDelete').setAttribute('checked', '');
    }else{
      document.getElementById('bannerDelete').removeAttribute('checked');
    }


    if(data.pageCreate == 'aktif'){
      document.getElementById('pageCreate').setAttribute('checked', '');
    }else{
      document.getElementById('pageCreate').removeAttribute('checked');
    }
    if(data.pageEdit == 'aktif'){
      document.getElementById('pageEdit').setAttribute('checked', '');
    }else{
      document.getElementById('pageEdit').removeAttribute('checked');
    }
    if(data.pageList == 'aktif'){
      document.getElementById('pageList').setAttribute('checked', '');
    }else{
      document.getElementById('pageList').removeAttribute('checked');
    }
    if(data.pageDelete == 'aktif'){
      document.getElementById('pageDelete').setAttribute('checked', '');
    }else{
      document.getElementById('pageDelete').removeAttribute('checked');
    }

        if(data.pageKategoriCreate == 'aktif'){
      document.getElementById('pageKategoriCreate').setAttribute('checked', '');
    }else{
      document.getElementById('pageKategoriCreate').removeAttribute('checked');
    }
    if(data.pageKategoriEdit == 'aktif'){
      document.getElementById('pageKategoriEdit').setAttribute('checked', '');
    }else{
      document.getElementById('pageKategoriEdit').removeAttribute('checked');
    }
    if(data.pageKategoriList == 'aktif'){
      document.getElementById('pageKategoriList').setAttribute('checked', '');
    }else{
      document.getElementById('pageKategoriList').removeAttribute('checked');
    }
    if(data.pageKategoriDelete == 'aktif'){
      document.getElementById('pageKategoriDelete').setAttribute('checked', '');
    }else{
      document.getElementById('pageKategoriDelete').removeAttribute('checked');
    }

    if(data.pesananCreate == 'aktif'){
      document.getElementById('pesananCreate').setAttribute('checked', '');
    }else{
      document.getElementById('pesananCreate').removeAttribute('checked');
    }
    if(data.pesananEdit == 'aktif'){
      document.getElementById('pesananEdit').setAttribute('checked', '');
    }else{
      document.getElementById('pesananEdit').removeAttribute('checked');
    }
    if(data.pesananList == 'aktif'){
      document.getElementById('pesananList').setAttribute('checked', '');
    }else{
      document.getElementById('pesananList').removeAttribute('checked');
    }
    if(data.pesananDelete == 'aktif'){
      document.getElementById('pesananDelete').setAttribute('checked', '');
    }else{
      document.getElementById('pesananDelete').removeAttribute('checked');
    }

    if(data.pesananSumberCreate == 'aktif'){
      document.getElementById('pesananSumberCreate').setAttribute('checked', '');
    }else{
      document.getElementById('pesananSumberCreate').removeAttribute('checked');
    }
    if(data.pesananSumberEdit == 'aktif'){
      document.getElementById('pesananSumberEdit').setAttribute('checked', '');
    }else{
      document.getElementById('pesananSumberEdit').removeAttribute('checked');
    }
    if(data.pesananSumberList == 'aktif'){
      document.getElementById('pesananSumberList').setAttribute('checked', '');
    }else{
      document.getElementById('pesananSumberList').removeAttribute('checked');
    }
    if(data.pesananSumberDelete == 'aktif'){
      document.getElementById('pesananSumberDelete').setAttribute('checked', '');
    }else{
      document.getElementById('pesananSumberDelete').removeAttribute('checked');
    }

    if(data.subscribe == 'aktif'){
      document.getElementById('subscribe').setAttribute('checked', '');
    }else{
      document.getElementById('subscribe').removeAttribute('checked');
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