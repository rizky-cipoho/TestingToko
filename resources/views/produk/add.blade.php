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

		<!-- ico-font-->
		{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}"> --}}

		<!-- Prism css-->
		{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}"> --}}

		<!-- Chartist css -->
		{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}"> --}}

		<!-- Bootstrap css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

		<!-- App css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	</x-slot>
	<div class="page-body" style="margin-top:0px;">
		<!-- Container-fluid starts-->
		{{-- @dd($produk) --}}

		<div class="container-fluid">
			<div class="page-header">
				<div class="row">
					<div class="col-lg-6">
						<div class="page-header-left">
							<h3>
								@if(isset($id))
								Change Product
								@else
								Add Products
								@endif
								<small>Multikart Admin panel</small>
							</h3>
						</div>
					</div>
					<div class="col-lg-6">
						<ol class="breadcrumb pull-right">
							<li class="breadcrumb-item">
								<a href="index.html">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
								</a>
							</li>
							<li class="breadcrumb-item">Physical</li>
							<li class="breadcrumb-item active">Add Product</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- Container-fluid Ends-->
		{{-- @dd($status) --}}
		@if(isset($id))
		<form action="{{ route('produk.edit.proses', $id) }}" method="POST" enctype="multipart/form-data">
			@else
			<form action="{{ route('produk.add.proses') }}" method="POST" enctype="multipart/form-data">
				@endif
				@csrf
				<!-- Container-fluid starts-->
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">

								<div class="card-body">
									@if(session()->has('status'))
									{{-- @dd($status) --}}
									<div class="alert alert-success">
										Produk berhasil ditambahkan
									</div>

									@endif
									@if ($errors->any())
									<div class="alert alert-danger" role="alert">
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li><br>
										@endforeach
									</div>
									@endif
									
									<div class="row product-adding">
										<div class="col-xl-5">
											<div class="add-product">
												<div class="row">
													<div class="col-xl-9 xl-50 col-sm-6 col-9">
														<div class="box-input-file" style="width: 100%;">
															<img id="output_image_cover" src="{{ isset($produk) ? asset($produk->gambar) : asset('assets/images/400x400-image.jpg') }}" style="width:100%!important;">
															<input class="upload" name="gambar" type="file" onchange="preview_image_cover(event)" style="width:100%; height:100px; z-index: 999; margin-top: 20px; cursor:pointer;" accept="image/*"></div>
														</div>
														<div class="col-xl-3 xl-50 col-sm-6 col-3">
															<ul class="file-upload-product">
																<div id="imageproduk" style="position:relative;">
																	@if(isset($produk))
																	@foreach($produk->image as $index=>$image)
																	<li style="float: left; margin: 5px; position:relative;">
																		<div class="box-input-file" style="width: 100px; height:100px;">
																			<img id="output_image[{{$index}}]" name="foto_produk[]" src="{{ asset($image->gambar) }}" style="width:100px; height:100px;">
																			<input class="upload" name="gambar_produk[{{$index}}][gambar]" type="file" onchange="preview_image('output_image[{{$index}}]' ,event)" style="width:100px; height:100px;  z-index: 999; cursor:pointer;" accept="image/*">
																			<input type="text" name="gambar_produk[{{$index}}][id]" style="display:none;" value="{{ $image->id }}">
																			<i class="fa fa-plus" style="position: absolute;"></i>
																		</div>
																	</li>
																	@endforeach
																	@else
																	<li style="float: left; margin: 5px; position:relative;">
																		<div class="box-input-file" style="width: 100px; height:100px;">
																			<img id="output_image[0]" name="foto_produk[]" src="{{ asset('assets/images/400x400-image.jpg') }}" style="width:100px; height:100px;">
																			<input class="upload" name="gambar_produk[0]" type="file" onchange="preview_image('output_image[0]',event)" style="width:100px; height:100px;  z-index: 999; cursor:pointer;"><i class="fa fa-plus" style="position: absolute;" accept="image/*"></i>
																		</div>
																	</li>
																	@endif
																</div>
																<span id="output_imageproduk" style="position:relative; width: 100px; height: 100px;"></span>
																<li style="float: left; margin: 5px; cursor: pointer;" onclick="btn_image();">
																	<div class="box-input-file" style="width: 100px; height:100px;"><div class="upload" style="opacity: 1; font-size: 10px;text-align: center; position: relative; font-weight:600;">MORE IMAGE</div>
																</li>

															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-7">
												<form class="needs-validation add-product-form" novalidate="">
													<div class="form">
														<div class="form-group mb-3 row">
															<label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
															<div class="col-xl-9 col-sm-7">
																<input class="form-control" name="judul_id" id="validationCustom01" type="text" placeholder="Title ID"  value="{{ old('judul_id') ? old('judul_id') : (isset($produk) ? $produk->judul_id : '') }}">
																@if ($errors->any() && isset($errors->default->messages()['judul_id']))
																<small class="text-danger">{{ $errors->default->messages()['judul_id'][0] }}</small>
																@endif
																<input class="form-control" name="judul_en" id="validationCustom01" type="text" placeholder="Title EN"  style="margin-top: 10px;" value="{{ old('judul_en') ? old('judul_en') : (isset($produk) ? $produk->judul_en : '') }}">
																@if ($errors->any() && isset($errors->default->messages()['judul_en']))
																<small class="text-danger">{{ $errors->default->messages()['judul_en'][0] }}</small>
																@endif
															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category :</label>
															<div class="col-xl-9 col-sm-7">
																<select name="kategori" class="form-control">
																	<option value="">-- Choice --</option>
																	@foreach($kategoris as $kategori)
																	<option value="{{ $kategori->id }}" {{ old('kategori') == $kategori->id ? 'selected' : (isset($produk) == $kategori->id ? 'selected' : '') }}>ID:{{ $kategori->kategori_id }} / EN:{{ $kategori->kategori_en }}</option>
																	@endforeach
																</select>
																@if ($errors->any() && isset($errors->default->messages()['kategori']))
																<small class="text-danger">{{ $errors->default->messages()['kategori'][0] }}</small>
																@endif
															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
															<div class="col-xl-9 col-sm-7">
																<div class="row">
																	<div class="col-xl-6 col-sm-7">
																		<input placeholder="Price ID" name="harga_id" class="form-control" id="validationCustom02" type="text"  value="{{ old('harga_id') ? old('harga_id') : (isset($produk) ? $produk->harga_id : '') }}">
																		@if ($errors->any() && isset($errors->default->messages()['harga_id']))
																		<small class="text-danger">{{ $errors->default->messages()['harga_id'][0] }}</small>
																		@endif
																		<input placeholder="Price EN" name="harga_en" class="form-control" id="validationCustom02" type="text"  style="margin-top: 10px;" value="{{ old('harga_en') ? old('harga_en') : (isset($produk) ? $produk->harga_en : '') }}">
																		@if ($errors->any() && isset($errors->default->messages()['harga_en']))
																		<small class="text-danger">{{ $errors->default->messages()['harga_en'][0] }}</small>
																		@endif
																	</div>
																	<div class="col-xl-6 col-sm-7">
																		<input placeholder="Sale Price ID" name="diskon_id" class="form-control" id="validationCustom02" type="text"  value="{{ old('diskon_id') ? old('diskon_id') : (isset($produk) ? $produk->diskon_id : '') }}">
																		@if ($errors->any() && isset($errors->default->messages()['diskon_id']))
																		<small class="text-danger">{{ $errors->default->messages()['diskon_id'][0] }}</small>
																		@endif
																		<input placeholder="Sale Price EN" name="diskon_en" class="form-control" id="validationCustom02" type="text"  style="margin-top: 10px;" value="{{ old('diskon_en') ? old('diskon_en') : (isset($produk) ? $produk->diskon_en : '') }}">
																		@if ($errors->any() && isset($errors->default->messages()['diskon_en']))
																		<small class="text-danger">{{ $errors->default->messages()['diskon_en'][0] }}</small>
																		@endif
																	</div>
																	<div class="col-xl-6 col-sm-7 mt-2">
																		<input placeholder="Modal ID" name="modal_id" class="form-control" id="validationCustom02" type="text"  value="{{ old('modal_id') ? old('modal_id') : (isset($produk) ? $produk->modal_id : '') }}">
																		@if ($errors->any() && isset($errors->default->messages()['modal_id']))
																		<small class="text-danger">{{ $errors->default->messages()['modal_id'][0] }}</small>
																		@endif
																		<input placeholder="Modal EN" name="modal_en" class="form-control" id="validationCustom02" type="text"  style="margin-top: 10px;" value="{{ old('modal_en') ? old('modal_en') : (isset($produk) ? $produk->modal_en : '') }}">
																		@if ($errors->any() && isset($errors->default->messages()['modal_en']))
																		<small class="text-danger">{{ $errors->default->messages()['modal_en'][0] }}</small>
																		@endif
																	</div>
																</div>
															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
															<div class="col-xl-9 col-sm-7">
																<input class="form-control" name="kode_sku" placeholder="Product Code" id="validationCustomUsername" type="text"  value="{{ old('kode_sku') ? old('kode_sku') : (isset($produk) ? $produk->kode_sku : '') }}">
																@if ($errors->any() && isset($errors->default->messages()['kode_sku']))
																<small class="text-danger">{{ $errors->default->messages()['kode_sku'][0] }}</small>
																@endif
															</div>
															<div class="invalid-feedback offset-sm-4 offset-xl-3">Please
															choose Valid Code.</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Color :</label>
															<div class="col-md-9" >
																<div class="row">
																	<div class="col-xl-4 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Judul Warna</label>
																	</div>
																	<div class="col-xl-3 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Kode Warna</label>
																	</div>
																	<div class="col-xl-3 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Gambar</label>
																	</div>
																	<div class="col-xl-2 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Status</label>
																	</div>
																	<div style="margin-bottom:10px; display: block; width: 100%;"></div>
																</div>
																@if(isset($produk))
																@foreach($produk->warna as $index=>$warna)
																<input type="text" name="warna[{{ $index }}][id]" style="display: none;" value="{{ $warna->id }}">
																
																<div id="warna">
																	<div class="row" >
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="warna[{{ $index }}][warna]" id="validationCustomUsername" placeholder="Judul Warna" type="text"  value="{{ old('warna['.$index.'][warna]') ? old('warna['.$index.'][warna]') : $warna->warna }}">
																			@if ($errors->any() && isset($errors->default->messages()['warna['.$index.'][warna]']))
																			<small class="text-danger">{{ $errors->default->messages()['warna['.$index.'][warna]'] }}</small>
																			@endif
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="warna[{{ $index }}][kode_warna]" id="validationCustomUsername" placeholder="Kode Warna" type="text"  value="{{ old('warna['.$index.'][kode_warna]') ? old('warna['.$index.'][kode_warna]') : $warna->kode_warna }}">
																			@if ($errors->any() && isset($errors->default->messages()['warna['.$index.'][kode_warna]']))
																			<small class="text-danger">{{ $errors->default->messages()['warna['.$index.'][kode_warna]'] }}</small>
																			@endif
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="warna[{{ $index }}][gambar_warna]" id="validationCustomUsername" type="file"  accept="image/*" @if(!isset($produk))  @endif>
																			@if ($errors->any() && isset($errors->default->messages()['warna['.$index.'][gambar_warna]']))
																			<small class="text-danger">{{ $errors->default->messages()['warna['.$index.'][gambar_warna]'] }}</small>
																			@endif
																		</div>
																		<div class="col-xl-2 col-sm-7">
																			<select class="form-control" name="warna[{{ $index }}][status_warna]" id="validationCustomUsername" type="text" >
																				<option value="Ready" {{ old('warna['.$index.'][status_warna]') == 'Ready' ? 'selected' : ($warna->status == 'Ready' ? 'selected' : '') }}>Ready</option>
																				<option value="Sold Out" {{ old('warna['.$index.'][status_warna]') == 'Sold Out' ? 'selected' : ($warna->status == 'Sold Out' ? 'selected' : '') }}>Sold Out</option>
																			</select>
																			@if ($errors->any() && isset($errors->default->messages()['warna['.$index.'][status_warna]']))
																			<small class="text-danger">{{ $errors->default->messages()['warna['.$index.'][status_warna]'] }}</small>
																			@endif
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>
																	</div>
																</div>
																@endforeach
																@else
																<div id="warna">
																	@if($errors->any())
																		@foreach(old('warna') as $index=>$warna)
																			@include('./../components/add/warna/add-request-errors', ['warna'=>$warna, 'index'=>$index, 'errors'=>$errors->default->messages()])
																		@endforeach
																	@else
																		@include('./../components/add/warna/add-request')
																	@endif									
																</div>
																@endif
																<div class="row" id="output_warna"></div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="badge badge-pill badge-primary" style="width:100%; padding: 10px; cursor: pointer;" onclick="btn_warna();">Add More Color</div>
																	</div>

																</div>
															</div>
														</div>
														<div class="invalid-feedback offset-sm-4 offset-xl-3">Please
														choose Valid Code.</div>
														<div class="form-group mb-3 row">
															<label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Size :</label>
															<div class="col-md-9" >
																<div class="row">
																	<div class="col-xl-4 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Size ID</label>
																	</div>
																	<div class="col-xl-4 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Size EN</label>
																	</div>
																	<div class="col-xl-4 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Status</label>
																	</div>

																</div>
																@if(isset($produk))
																@foreach($produk->ukuran as $index=>$ukuran)
																<input type="text" name="size[{{ $index }}][id]" style="display: none;" value="{{ $ukuran->id }}">
																<div id="size">
																	<div class="row" >
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="size[{{$index}}][size_id]" id="validationCustomUsername" placeholder="Size ID" type="text"  value="{{ old('size['.$index.'][size_id]') ? old('size['.$index.'][size_id]') : $ukuran->ukuran_id }}">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="size[{{$index}}][size_en]" id="validationCustomUsername" placeholder="Size EN" type="text"  value="{{ old('size['.$index.'][size_en]') ? old('size['.$index.'][size_en]') : $ukuran->ukuran_en }}">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<select class="form-control" name="size[{{$index}}][status_size]" id="validationCustomUsername" type="text" >
																				<option value="Aktif" {{ old('size['.$index.'][status_size]') == 'Aktif' ? 'selected' : ($ukuran->status == 'Aktif' ? 'selected' : '') }}>Aktif</option>
																				<option value="Tidak Aktif" {{ old('size['.$index.'][status_size]') == 'Tidak Aktif' ? 'selected' : ($ukuran->status == 'Tidak Aktif' ? 'selected' : '') }}>Tidak Aktif</option>
																			</select>
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>

																	</div>
																</div>
																@endforeach
																@else
																{{-- @dd(old('size')) --}}
																	@if($errors->any())
																		@foreach(old('size') as $index=>$size)
																			@include('./../components/add/size/add-request-errors-size',['size'=>$size, 'errors'=>$errors->default->messages(), 'index'=>$index])
																		@endforeach
																	@else
																			@include('./../components/add/size/add-request-size')
																	@endif
																@endif
																<div class="row" id="output_size" ></div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="badge badge-pill badge-primary" style="width:100%; padding: 10px; cursor: pointer;" onclick="btn_size();">Add More Size</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="invalid-feedback offset-sm-4 offset-xl-3">Please
														choose Valid Code.</div>


														<div class="form-group mb-3 row">
															<label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Link Marketplace :</label>
															<div class="col-md-9" >
																<div class="row">
																	<div class="col-xl-3 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Judul</label>
																	</div>
																	<div class="col-xl-4 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Link</label>
																	</div>
																	<div class="col-xl-3 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Target</label>
																	</div>
																	<div class="col-xl-2 col-sm-7">
																		<label style="font-size: 14px; color: #555;">Status</label>
																	</div>

																</div>
																@if(isset($produk))
																@foreach($produk->link as $index=>$link)
																<input type="text" name="link[{{ $index }}][id]" style="display: none;" value="{{ $link->id }}">
																<div id="link">
																	<div class="row" >
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="link[{{$index}}][judul_link]" id="validationCustomUsername" placeholder="Text Tombol" type="text"  value="{{ old('link['.$index.'][judul_link]') ? old('link['.$index.'][judul_link]') : $link->judul_link }}">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="link[{{$index}}][link]" id="validationCustomUsername" placeholder="Link Tujuan" type="text"  value="{{ old('link['.$index.'][judul_link]') ? old('link['.$index.'][judul_link]') : $link->link }}">
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<select class="form-control" name="link[{{$index}}][target]" id="validationCustomUsername" type="text">
																				<option value="inTab" {{ old('link['.$index.'][target]') == '' ? 'selected' : ($link->target == '' ? 'selected' : '') }}>Open In Tab</option>
																				<option value="_blank" {{ old('link['.$index.'][target]') == '_blank' ? 'selected' : ($link->target == '_blank' ? 'selected' : '') }}>Open In New Tab</option>
																			</select>
																		</div>
																		<div class="col-xl-2 col-sm-7">
																			<select class="form-control" name="link[{{$index}}][status_link]" id="validationCustomUsername" type="text" >
																				<option value="Aktif" {{ old('link['.$index.'][status_link]') == 'Aktif' ? 'selected' : ($link->status == 'Aktif' ? 'selected' : '') }}>Aktif</option>
																				<option value="Tidak Aktif" {{ old('link['.$index.'][status_link]') == 'Tidak Aktif' ? 'selected' : ($link->status == 'Tidak Aktif' ? 'selected' : '') }}>Tidak Aktif</option>
																			</select>
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>
																	</div>
																</div>
																@endforeach
																@else
																<div id="link">
																	<div class="row" >
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="link[0][judul_link]" id="validationCustomUsername" placeholder="Text Tombol" type="text"  value="{{ old('link[0][judul_link]') ? old('link[0][judul_link]') : '' }}">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="link[0][link]" id="validationCustomUsername" placeholder="Link Tujuan" type="text"  value="{{ old('link[0][judul_link]') ? old('link[0][judul_link]') : '' }}">
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<select class="form-control" name="link[0][target]" id="validationCustomUsername" type="text">
																				<option value="inTab" {{ old('link[0][target]') == '' ? 'selected' : '' }}>Open In Tab</option>
																				<option value="_blank" {{ old('link[0][target]') == '_blank' ? 'selected' : '' }}>Open In New Tab</option>
																			</select>
																		</div>
																		<div class="col-xl-2 col-sm-7">
																			<select class="form-control" name="link[0][status_link]" id="validationCustomUsername" type="text" >
																				<option value="Aktif" {{ old('link[0][status_link]') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
																				<option value="Tidak Aktif" {{ old('link[0][status_link]') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
																			</select>
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>
																	</div>
																</div>
																@endif
																<div class="row" id="output_link" ></div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="badge badge-pill badge-primary" style="width:100%; padding: 10px; cursor: pointer;" onclick="btn_link();">Add More Link</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="invalid-feedback offset-sm-4 offset-xl-3">Please
														choose Valid Code.</div>



														<div class="form-group mb-3 row">
															<label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Link Video :</label>
															<div class="col-xl-9 col-sm-7">
																<input class="form-control" name="link_video" id="validationCustom01" type="text" placeholder="Link Video Youtube" value="{{ old('link_video') ? old('link_video') : (isset($produk) ? $produk->link_video : '') }}">

															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>

														<div class="invalid-feedback offset-sm-4 offset-xl-3">Please
														choose Valid Code.</div>
														<div class="form-group mb-3 row">
															<label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Status :</label>
															<div class="col-xl-9 col-sm-7">
																<select class="form-control" name="status" id="validationCustomUsername" type="text">
																	<option value="Ready">Ready</option>
																	<option value="Sold Out">Sold Out</option>
																</select>

															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-sm-4">Description ID:</label>

															<div class="col-xl-9 col-sm-7 description-sm">
																<div class="editor-space row" style="display: contents;">
																	<textarea id="editor1" name="deskripsi_id" cols="30"
																	rows="10" placeholder="Description ID">{{ old('deskripsi_id') ? old('deskripsi_id') : (isset($produk) ? $produk->deskripsi_id : '') }}</textarea>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-sm-4">Description EN:</label>

															<div class="col-xl-9 col-sm-7 description-sm">
																<div class="editor-space row" style="display: contents;">
																	<textarea id="editor2" name="deskripsi_en" cols="30"
																	rows="10" placeholder="Description EN">{{ old('deskripsi_en') ? old('deskripsi_en') : (isset($produk) ? $produk->deskripsi_en : '') }}</textarea>
																</div>
															</div>
														</div>
														<div class="offset-xl-3 offset-sm-4 mt-4">
															<button type="submit" name="simpan" class="btn btn-primary" id="submitLoading">
																@if(isset($id))
																Change
																@else
																Add
																@endif
															</button>
															@if(!isset($id))
															<button type="button" class="btn btn-light">Discard</button>
															@endif

														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Container-fluid Ends-->
			</form>
			{{-- {{ old() != [] ? dd() : '' }}	 --}}
			{{ $indexWarna = old() != [] ? count(old('warna')) : 0 }}	
			{{ $indexSize = old() != [] ? count(old('size')) : 0 }}	

		</div>
		<script type="text/javascript">
			var warna = {{ isset($produk) ? $produk->warna->count() : $indexWarna }};
			var size = {{ isset($produk) ? $produk->ukuran->count() : $indexSize }};
			var countImage =  {{ isset($produk) ? $produk->image->count() : 0 }};
			var link = {{ isset($produk) ? $produk->link->count() : 0 }};
			function btn_warna() {
        // var parentDOM = document.getElementById("warna").innerHTML;
        // alert(parentDOM);
				warna++;
        var addButton = $('.btn_warna'); //Add button selector
        var wrapper = $('#output_warna'); //Input field wrapper
        var fieldHTML = `<div id="warna">
        <div class="row" >
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="warna[${warna}][warna]" id="validationCustomUsername" placeholder="Judul Warna" type="text" >
        </div>
        <div class="col-xl-3 col-sm-7">
        <input class="form-control" name="warna[${warna}][kode_warna]" id="validationCustomUsername" placeholder="Kode Warna" type="text" >
        </div>
        <div class="col-xl-3 col-sm-7">
        <input class="form-control" name="warna[${warna}][gambar_warna]" id="validationCustomUsername" type="file" accept="image/*" @if(!isset($produk))  @endif>
        </div>
        <div class="col-xl-2 col-sm-7">
        <select class="form-control" name="warna[${warna}][status_warna]" id="validationCustomUsername" type="text" >
        <option value="Ready">Ready</option>
        <option value="Sold Out">Sold Out</option>
        </select>
        </div>
        <div style="margin-bottom:10px; display: block; width: 100%;"></div>

        </div>
        </div>`;

        var fildhtmlfix = "<div style='position:relative;'>"+fieldHTML+"<a href='javascript:void(0);' style='position:absolute; right: -8px; top: 8px;' class='remove_button'><i class='fa fa-times'></i></a></div>";

        $(wrapper).append(fildhtmlfix); //Add field html



        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
        	e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            $('.remove_button').style.display = "block";
            x--; //Decrease field counter
          });
      }
      function btn_size() {
        // var parentDOM = document.getElementById("warna").innerHTML;
        // alert(parentDOM);
      	size++;

        var addButton = $('.btn_size'); //Add button selector
        var wrapper = $('#output_size'); //Input field wrapper
        var fieldHTML = `<div id="size">
        <div class="row" >
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="size[${size}][size_id]" id="validationCustomUsername" placeholder="Size ID" type="text" >
        </div>
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="size[${size}][size_en]" id="validationCustomUsername" placeholder="Size EN" type="text" >
        </div>
        <div class="col-xl-4 col-sm-7">
        <select class="form-control" name="size[${size}][status_size]" id="validationCustomUsername" type="text" >
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
        </div>
        <div style="margin-bottom:10px; display: block; width: 100%;"></div>

        </div>
        </div>`; 
        var fildhtmlfix = "<div style='position:relative;'>"+fieldHTML+"<a href='javascript:void(0);' style='position:absolute; right: -8px; top: 8px;' class='remove_button'><i class='fa fa-times'></i></a></div>";

        $(wrapper).append(fildhtmlfix); //Add field html



        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
        	e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            $('.remove_button').style.display = "block";
            x--; //Decrease field counter
          });
      }
      function btn_link() {
        // var parentDOM = document.getElementById("warna").innerHTML;
        // alert(parentDOM);
      	link++;
        var addButton = $('.btn_link'); //Add button selector
        var wrapper = $('#output_link'); //Input field wrapper
        var fieldHTML = `<div id="link">
        <div class="row" >
        <div class="col-xl-3 col-sm-7">
        <input class="form-control" name="link[${link}][judul_link]" id="validationCustomUsername" placeholder="Text Tombol" type="text" >
        </div>
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="link[${link}][link]" id="validationCustomUsername" placeholder="Link Tujuan" type="text" >
        </div>
        <div class="col-xl-3 col-sm-7">
        <select class="form-control" name="link[${link}][target]" id="validationCustomUsername" type="text" >
        <option value="">Open In Tab</option>
        <option value="_blank">Open In New Tab</option>
        </select>
        </div>
        <div class="col-xl-2 col-sm-7">
        <select class="form-control" name="link[${link}][status_link]" id="validationCustomUsername" type="text" >
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
        </div>
        <div style="margin-bottom:10px; display: block; width: 100%;"></div>

        </div>
        </div>`;
        var fildhtmlfix = "<div style='position:relative;'>"+fieldHTML+"<a href='javascript:void(0);' style='position:absolute; right: -8px; top: 8px;' class='remove_button'><i class='fa fa-times'></i></a></div>";

        $(wrapper).append(fildhtmlfix); //Add field html



        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
        	e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            $('.remove_button').style.display = "block";
            x--; //Decrease field counter
          });
      }



      function btn_image() {
        // var parentDOM = document.getElementById("warna").innerHTML;
        // alert(parentDOM);
      	countImage++;
        var addButton = $('.btn_image'); //Add button selector
        var wrapper = $('#output_imageproduk'); //Input field wrapper
        @if(isset($produk))
        var fieldHTML = `<div id="imageproduk" style="position:relative;">
        <li style="float: left; margin: 5px; position:relative;">
        <div class="box-input-file" style="width: 100px; height:100px;">
        <img id="output_image[${countImage}]" name="foto_produk[]" src="{{ asset('assets/images/400x400-image.jpg')  }}" style="width:100px; height:100px;">
        <input class="upload" name="gambar_produk[${countImage}][gambar]" type="file"  accept="image/*" onchange="preview_image('output_image[${countImage}]', event)" style="width:100px; height:100px;  z-index: 999; cursor:pointer;"><i class="fa fa-plus" style="position: absolute;"></i>
        </div>
        </li>
        </div>`; //New input field html 
        @else
        var fieldHTML = `<div id="imageproduk" style="position:relative;">
        <li style="float: left; margin: 5px; position:relative;">
        <div class="box-input-file" style="width: 100px; height:100px;">
        <img id="output_image[${countImage}]" name="foto_produk[]" src="{{ asset('assets/images/400x400-image.jpg')  }}" style="width:100px; height:100px;">
        <input class="upload" name="gambar_produk[${countImage}]" type="file" accept="image/*" onchange="preview_image('output_image[${countImage}]', event)" style="width:100px; height:100px;  z-index: 999; cursor:pointer;"><i class="fa fa-plus" style="position: absolute;"></i>
        </div>
        </li>
        </div>`; //New input field html 
        @endif
        var fildhtmlfix = "<div style='position:relative;'>"+fieldHTML+"<a href='javascript:void(0);' style='position:absolute; right: -8px; top: 8px; z-index:999;' class='remove_button'><i class='fa fa-times'></i></a></div>";
        $(wrapper).append(fildhtmlfix); //Add field html

        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
        	e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            $('.remove_button').style.display = "block";
            x--; //Decrease field counter
          });
      }
      function preview_image(id, e) {
        // output_image
        // console.log(e)
        // console.log(id)
      	console.log(id)
      	var reader = new FileReader();
      	reader.onload = function(){
      		var output = document.getElementById(id);
      		output.src = reader.result;
      	}
      	reader.readAsDataURL(e.target.files[0]);
      }
      function preview_image_cover(event) {
      	var reader = new FileReader();
      	reader.onload = function(){
      		var output = document.getElementById('output_image_cover');
      		output.src = reader.result;
      	}
      	reader.readAsDataURL(event.target.files[0]);
      }
      function loading(){
      	document.getElementById('submitLoading').innerHTML = 'Loading...'
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

    	<!--chartist js-->
    	{{-- <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script> --}}

    	<!--chartjs js-->
    	{{-- <script src="{{ asset('assets/js/chart/chartjs/chart.min.js') }}"></script> --}}
    	<script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
    	<script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    	<script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
    	<script src="{{ asset('assets/js/dashboard/form-validation-custom.js') }}"></script>
    	<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
    	<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>

    	<!-- lazyload js-->
    	<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

    	<!--copycode js-->
{{--     <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script> --}}

    <!--counter js-->
{{--     <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script> --}}

    <!--peity chart js-->
    {{-- <script src="{{ asset('assets/js/chart/peity-chart/peity.jquery.js') }}"></script> --}}

    <!-- Apex Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--sparkline chart js-->
    {{-- <script src="{{ asset('assets/js/chart/sparkline/sparkline.js') }}"></script> --}}

    <!--Customizer admin-->
    <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>

    <!--dashboard custom js-->
    {{-- <script src="{{ asset('assets/js/dashboard/default.js') }}"></script> --}}

    <!--right sidebar js-->
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>

    <!--height equal js-->
    {{-- <script src="{{ asset('assets/js/height-equal.js') }}"></script> --}}

    <!-- lazyload js-->
    {{-- <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script> --}}

    <!--script admin-->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/js/zoom-scripts.js') }}"></script>
  </x-slot>
  <!--ck editor-->
  {{-- <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script> --}}
</x-guest-layout>