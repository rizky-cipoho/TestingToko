<x-guest-layout>
	<x-slot name="css">
		<link rel="icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">
		<link rel="shortcut icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">
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
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
	</x-slot>
	<div class="page-body">
		<!-- Container-fluid starts-->
		<div class="container-fluid">
			<div class="page-header">
				<div class="row">
					<div class="col-lg-6">
						<div class="page-header-left">
							<h3>
								@if(isset($page))
								Edit Page
								@else
								Create Page
								@endif
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
							<li class="breadcrumb-item">Page</li>
							<li class="breadcrumb-item active">Create Page</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- Container-fluid Ends-->

		<!-- Container-fluid starts-->
		<div class="container-fluid">
			<div class="card tab2-card">
				<div class="card-body">
					<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
						<li class="nav-item"><a class="nav-link active show" id="general-tab"
							data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
							aria-selected="true" data-original-title="" title="">General</a></li>
							<li class="nav-item"><a class="nav-link" id="seo-tabs" data-bs-toggle="tab" href="#seo"
								role="tab" aria-controls="seo" aria-selected="false" data-original-title=""
								title="">SEO</a></li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade active show" id="general" role="tabpanel"
								aria-labelledby="general-tab">
								@if(isset($page))
								<form class="needs-validation" method="post" action="{{ route('page.edit.proses', $page->id) }}">
								@else
								<form class="needs-validation" method="post" action="{{ route('page.add.proses') }}">
								@endif
									@csrf
									<h4>General</h4>
									<div class="form-group row">
										<label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
										Judul ID</label>
										<div class="col-xl-8 col-md-7">
											<input class="form-control" id="validationCustom0" type="text" name="judul_id" value="{{ old('judul_id') ? old('judul_id') : (isset($page) ? $page->judul_id : '') }}">
										</div>
									</div>
									<div class="form-group row">
										<label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
										Judul En</label>
										<div class="col-xl-8 col-md-7">
											<input class="form-control" id="validationCustom0" type="text" name="judul_en" value="{{ old('judul_en') ? old('judul_en') : (isset($page) ? $page->judul_en : '') }}">
										</div>
									</div>
									<div class="form-group row editor-label">
										<label class="col-xl-3 col-md-4"><span>*</span>Artikel ID</label>
										<div class="col-xl-8 col-md-7">
											<div class="">
												<textarea id="editor1" name="artikel_id" cols="30"
												rows="10">{{ old('artikel_id') ? old('artikel_id') : (isset($page) ? $page->artikel_id : '') }}</textarea>
											</div>
										</div>
									</div>
									<div class="form-group row editor-label">
										<label class="col-xl-3 col-md-4"><span>*</span>Artikel EN</label>
										<div class="col-xl-8 col-md-7">
											<div class="">
												<textarea id="editor2" name="artikel_en" cols="30"
												rows="10">{{ old('artikel_en') ? old('artikel_en') : (isset($page) ? $page->artikel_en : '') }}</textarea>
											</div>
										</div>
									</div>
									<div class="form-group row editor-label">
										<label class="col-xl-3 col-md-4"><span>*</span> Kategori</label>
										<div class="col-xl-8 col-md-7">
											<div class="">
												<select name="kategori" class="form-control">
													<option>-- Pilih --</option>
													@foreach($kategoris as $kategori)
													<option value="{{ $kategori->id }}" {{ old('kategori') && old('kategori') == $kategori->id ? 'selected' : (isset($page) && $page->kategori_id == $kategori->id ? 'selected' : '') }}>ID: {{ $kategori->kategori_id }} / EN: {{ $kategori->kategori_en }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									{{-- @dd(old('status') && old('status') == 'Aktif') --}}
									<div class="form-group row">
										<label class="col-xl-3 col-md-4">Status</label>
										<div class="col-xl-8 col-md-7">
											<div class="checkbox checkbox-primary ">
												<input id="checkbox-primary-2" type="checkbox"
												data-original-title="" title="" name="status" value="Aktif" {{ old('status') && old('status') == 'Aktif' ? 'checked' : (isset($page) && $page->status == 'Aktif' ? 'checked' : '') }}>
												<label for="checkbox-primary-2">Enable the Page</label>
											</div>
										</div>
									</div>
									<div class="pull-right">
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
								<form class="needs-validation">
									<h4>SEO</h4>
									<div class="form-group row">
										<label for="validationCustom2" class="col-xl-3 col-md-4">Meta Title</label>
										<div class="col-xl-8 col-md-7">
											<input class="form-control" id="validationCustom2" type="text">
										</div>
									</div>
									<div class="form-group row editor-label">
										<label class="col-xl-3 col-md-4">Meta Description</label>
										<div class="col-xl-8 col-md-7">
											<textarea rows="4" class="form-control"></textarea>
										</div>
									</div>
								</form>
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
			<script src="{{ asset('assets/js/chat-menu.js') }}"></script>
			<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
			<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
		</x-slot>

	</x-guest-layout>