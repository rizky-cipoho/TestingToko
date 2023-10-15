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
              <h3>Profile
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
              <li class="breadcrumb-item">Settings</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="profile-details text-center">
                <img src="assets/images/dashboard/designer.jpg" alt=""
                class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                <h5 class="f-w-600 mb-0">John deo</h5>
                <span>johndeo@gmail.com</span>
                <div class="social">
                  <div class="form-group btn-showcase">
                    <button class="btn social-btn btn-fb d-inline-block"> <i
                      class="fa fa-facebook"></i></button>
                      <button class="btn social-btn btn-twitter d-inline-block"><i
                        class="fa fa-google"></i></button>
                        <button class="btn social-btn btn-google d-inline-block me-0"><i
                          class="fa fa-twitter"></i></button>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="project-status">
                      <h5 class="f-w-600">Employee Status</h5>
                      <div class="media">
                        <div class="media-body">
                          <h6>Performance<span class="pull-right">80%</span></h6>
                          <div class="progress sm-progress-bar">
                            <div class="progress-bar bg-primary" role="progressbar"
                            style="width: 90%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-body">
                          <h6>Overtime <span class="pull-right">60%</span></h6>
                          <div class="progress sm-progress-bar">
                            <div class="progress-bar bg-secondary" role="progressbar"
                            style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-body">
                          <h6>Leaves taken<span class="pull-right">70%</span></h6>
                          <div class="progress sm-progress-bar">
                            <div class="progress-bar bg-danger" role="progressbar"
                            style="width: 70%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8">
                <div class="card tab2-card">
                  <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="top-profile-tab"
                        data-bs-toggle="tab" href="#top-profile" role="tab"
                        aria-controls="top-profile" aria-selected="true"><i data-feather="user"
                        class="me-2"></i>Profile</a>
                      </li>
                      <li class="nav-item"><a class="nav-link" id="contact-top-tab"
                        data-bs-toggle="tab" href="#top-contact" role="tab"
                        aria-controls="top-contact" aria-selected="false"><i
                        data-feather="settings" class="me-2"></i>Contact</a>
                      </li>
                    </ul>
                    <form action="{{ route('profile.edit.proses', $user->id) }}"  method="post">
                      @csrf
                      <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                        aria-labelledby="top-profile-tab">
                        <h5 class="f-w-600">Profile</h5>
                        <div class="table-responsive profile-table">
                          <table class="table table-borderless">
                            <tbody>

                              <tr>
                                <td>Name:</td>
                                <td><input type="text" name="name" class="form-control" value="{{ $user->name }}"></td>
                              </tr>
                              <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" class="form-control" value="{{ $user->username }}"></td>
                              </tr>
                              <tr>
                                <td>Email:</td>
                                <td><input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}"></td>
                              </tr>
                              <tr>
                                <td>Gender:</td>
                                <td><div class="col-xl-8 col-md-7">
                                  {{-- @dd($user->jenis_kelamin) --}}
                                  <input 
                                  class="form-control" 
                                  id="jk1" 
                                  autocomplete="off" 
                                  type="radio"
                                  name="jenis_kelamin"
                                  value="laki-laki"
                                  {{ $user->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                                  <label for="jk1">Laki-laki</label>
                                  <input class="form-control" autocomplete="off" id="jk2" type="radio"
                                  name="jenis_kelamin"
                                  value="perempuan"
                                  {{ $user->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                                  >
                                  <label for="jk2">Perempuan</label>

                                </div></td>
                              </tr>
                              <tr>
                                <td>Status:</td>
                                <td>
                                  <div class="col-xl-8 col-md-7">
                                    <input class="form-control" id="jk1" autocomplete="off" type="radio"
                                    name="status"
                                    value="0"
                                    {{ $user->status == 0 ? 'checked' : '' }}
                                    >
                                    <label for="jk1">Aktif</label>
                                    <input class="form-control" autocomplete="off" id="jk2" type="radio"
                                    name="status"
                                    value="1"
                                    {{ $user->status == 1 ? 'checked' : '' }}
                                    >
                                    <label for="jk2">Tidak Aktif</label>

                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Role:</td>
                                <td>
                                  <div class="col-xl-8 col-md-7">
                                    <select class="form-control">
                                      @foreach($roles as $role)
                                      <option  {{ $user->id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->role }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Image:</td>
                                <td>
                                  <div class="col-xl-8 col-md-7">
                                    <input type="file" name="image" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Password:</td>
                                <td><input type="text" name="password" class="form-control"></td>
                              </tr>
                              <tr>
                                <td>Confirm Password:</td>
                                <td><input type="text" name="password_confirmation" class="form-control"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div style="display: flex; justify-content: right;">
                        <button type="submit" class="btn btn-primary">edit</button>
                      </div>
                    </form>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel"
                    aria-labelledby="contact-top-tab">
                    <div class="account-setting">
                      <h5 class="f-w-600">Notifications</h5>
                      <div class="row">
                        <div class="col">
                          <label class="d-block" for="chk-ani">
                            <input class="checkbox_animated" id="chk-ani"
                            type="checkbox">
                            Allow Desktop Notifications
                          </label>
                          <label class="d-block" for="chk-ani1">
                            <input class="checkbox_animated" id="chk-ani1"
                            type="checkbox">
                            Enable Notifications
                          </label>
                          <label class="d-block" for="chk-ani2">
                            <input class="checkbox_animated" id="chk-ani2"
                            type="checkbox">
                            Get notification for my own activity
                          </label>
                          <label class="d-block mb-0" for="chk-ani3">
                            <input class="checkbox_animated" id="chk-ani3"
                            type="checkbox" checked="">
                            DND
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="account-setting deactivate-account">
                      <h5 class="f-w-600">Deactivate Account</h5>
                      <div class="row">
                        <div class="col">
                          <label class="d-block" for="edo-ani">
                            <input class="radio_animated" id="edo-ani" type="radio"
                            name="rdo-ani" checked="">
                            I have a privacy concern
                          </label>
                          <label class="d-block" for="edo-ani1">
                            <input class="radio_animated" id="edo-ani1" type="radio"
                            name="rdo-ani">
                            This is temporary
                          </label>
                          <label class="d-block mb-0" for="edo-ani2">
                            <input class="radio_animated" id="edo-ani2" type="radio"
                            name="rdo-ani" checked="">
                            Other
                          </label>
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary">Deactivate
                      Account</button>
                    </div>
                    <div class="account-setting deactivate-account">
                      <h5 class="f-w-600">Delete Account</h5>
                      <div class="row">
                        <div class="col">
                          <label class="d-block" for="edo-ani3">
                            <input class="radio_animated" id="edo-ani3" type="radio"
                            name="rdo-ani1" checked="">
                            No longer usable
                          </label>
                          <label class="d-block" for="edo-ani4">
                            <input class="radio_animated" id="edo-ani4" type="radio"
                            name="rdo-ani1">
                            Want to switch on other account
                          </label>
                          <label class="d-block mb-0" for="edo-ani5">
                            <input class="radio_animated" id="edo-ani5" type="radio"
                            name="rdo-ani1" checked="">
                            Other
                          </label>
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary">Delete Account</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid Ends-->
    </div>
{{--     <script type="text/javascript">
      document.getElementById("email").value = {{ $user->email }};
      console.log({{ $user->email }})
    </script> --}}
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