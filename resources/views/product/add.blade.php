<x-guest-layout>
	{{-- @dd(Auth::user()->with('attachment')->first()) --}}
	<div class="page-body" style="margin-top:0px;">
		<!-- Container-fluid starts-->
		<div class="container-fluid">
			<div class="page-header">
				<div class="row">
					<div class="col-lg-6">
						<div class="page-header-left">
							<h3>Add Products
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
		<form action="{{ route('product.add.proses') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<!-- Container-fluid starts-->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="row product-adding">
									<div class="col-xl-5">
										<div class="add-product">
											<div class="row">
												<div class="col-xl-9 xl-50 col-sm-6 col-9">
													<div class="box-input-file" style="width: 100%;">
														<img id="output_image_cover" src="{{ asset('assets/images/400x400-image.jpg') }}" style="width:100%!important;">
														<input class="upload" name="gambar" type="file" onchange="preview_image_cover(event)" style="width:100%; height:100px; z-index: 999; margin-top: 20px; cursor:pointer;"></div>
													</div>
													<div class="col-xl-3 xl-50 col-sm-6 col-3">
														<ul class="file-upload-product">
															<div id="imageproduk" style="position:relative;">
																<li style="float: left; margin: 5px; position:relative;">
																	<div class="box-input-file" style="width: 100px; height:100px;">
																		<img id="output_image" name="foto_produk[]" src="assets/images/400x400-image.jpg" style="width:100px; height:100px;">
																		<input class="upload" type="file" onchange="preview_image(event)" name="gambar_produk[0]" style="width:100px; height:100px;  z-index: 999; cursor:pointer;"><i class="fa fa-plus" style="position: absolute;"></i></div>


																	</li>
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
																<input class="form-control" name="judul_id" id="validationCustom01" type="text" placeholder="Title ID" required="">
																<input class="form-control" name="judul_en" id="validationCustom01" type="text" placeholder="Title EN" required="" style="margin-top: 10px;">
															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category :</label>
															<div class="col-xl-9 col-sm-7">
																<select name="kategori" class="form-control">
																	<option value="">-- Choice --</option>
																	@foreach($kategoris as $kategori)
																	<option value="{{ $kategori->id }}">ID:{{ $kategori->kategori_id }} / EN:{{ $kategori->kategori_en }}</option>
																	@endforeach
																</select>
															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
															<div class="col-xl-9 col-sm-7">
																<div class="row">
																	<div class="col-xl-6 col-sm-7">
																		<input placeholder="Price ID" name="harga_id" class="form-control" id="validationCustom02" type="text" required="">
																		<input placeholder="Price EN" name="harga_en" class="form-control" id="validationCustom02" type="text" required="" style="margin-top: 10px;">
																	</div>
																	<div class="col-xl-6 col-sm-7">
																		<input placeholder="Sale Price ID" name="diskon_id" class="form-control" id="validationCustom02" type="text" required="">
																		<input placeholder="Sale Price EN" name="diskon_en" class="form-control" id="validationCustom02" type="text" required="" style="margin-top: 10px;">
																	</div>
																</div>
															</div>
															<div class="valid-feedback">Looks good!</div>
														</div>
														<div class="form-group mb-3 row">
															<label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
															<div class="col-xl-9 col-sm-7">
																<input class="form-control" name="kode_sku" placeholder="SKU Code" id="validationCustomUsername" type="text" required="">
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
																<div id="warna">
																	<div class="row" >
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="warna[0][warna]" id="validationCustomUsername" placeholder="Judul Warna" type="text" required="">
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="warna[0][kode_warna]" id="validationCustomUsername" placeholder="Kode Warna" type="text" required="">
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="warna[0][gambar_warna]" id="validationCustomUsername" type="file" required="">
																		</div>
																		<div class="col-xl-2 col-sm-7">
																			<select class="form-control" name="warna[0][status_warna]" id="validationCustomUsername" type="text" required="">
																				<option value="Ready">Ready</option>
																				<option value="Sold Out">Sold Out</option>
																			</select>
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>

																	</div>
																</div>
																<div class="row" id="output_warna" ></div>
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
																<div id="size">
																	<div class="row" >
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="size[0][size_id]" id="validationCustomUsername" placeholder="Size ID" type="text" required="">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="size[0][size_en]" id="validationCustomUsername" placeholder="Size EN" type="text" required="">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<select class="form-control" name="size[0][status_size]" id="validationCustomUsername" type="text" required="">
																				<option value="Aktif">Aktif</option>
																				<option value="Tidak Aktif">Tidak Aktif</option>
																			</select>
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>

																	</div>
																</div>
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
																<div id="link">
																	<div class="row" >
																		<div class="col-xl-3 col-sm-7">
																			<input class="form-control" name="link[0][judul_link]" id="validationCustomUsername" placeholder="Text Tombol" type="text" required="">
																		</div>
																		<div class="col-xl-4 col-sm-7">
																			<input class="form-control" name="link[0][link]" id="validationCustomUsername" placeholder="Link Tujuan" type="text" required="">
																		</div>
																		<div class="col-xl-3 col-sm-7">
																			<select class="form-control" name="link[0][target]" id="validationCustomUsername" type="text" required="">
																				<option value="">Open In Tab</option>
																				<option value="_blank">Open In New Tab</option>
																			</select>
																		</div>
																		<div class="col-xl-2 col-sm-7">
																			<select class="form-control" name="link[0][status_link]" id="validationCustomUsername" type="text" required="">
																				<option value="Aktif">Aktif</option>
																				<option value="Tidak Aktif">Tidak Aktif</option>
																			</select>
																		</div>
																		<div style="margin-bottom:10px; display: block; width: 100%;"></div>

																	</div>
																</div>
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
																<input class="form-control" name="link_video" id="validationCustom01" type="text" placeholder="Link Video Youtube">

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
															<label class="col-xl-3 col-sm-4">Description :</label>

															<div class="col-xl-9 col-sm-7 description-sm">
																<div class="editor-space row" style="display: contents;">
																	<textarea id="editor1" name="deskripsi_id" cols="30"
																	rows="10" placeholder="Description ID"></textarea>
																	<textarea id="editor2" name="deskripsi_en" cols="30"
																	rows="10" placeholder="Description EN"></textarea>
																</div>
															</div>
														</div>
														<div class="offset-xl-3 offset-sm-4 mt-4">
															<button type="submit" name="simpan" class="btn btn-primary">Add</button>
															<button type="button" class="btn btn-light">Discard</button>
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
		</div>
		<script type="text/javascript">
			var warna = 0;
			var size = 0;
			var link = 0;
			function btn_warna() {
        // var parentDOM = document.getElementById("warna").innerHTML;
        // alert(parentDOM);
				warna++;
        var addButton = $('.btn_warna'); //Add button selector
        var wrapper = $('#output_warna'); //Input field wrapper
        var fieldHTML = `<div id="warna">
        <div class="row" >
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="warna[${warna}][warna]" id="validationCustomUsername" placeholder="Judul Warna" type="text" required="">
        </div>
        <div class="col-xl-3 col-sm-7">
        <input class="form-control" name="warna[${warna}][kode_warna]" id="validationCustomUsername" placeholder="Kode Warna" type="text" required="">
        </div>
        <div class="col-xl-3 col-sm-7">
        <input class="form-control" name="warna[${warna}][gambar_warna]" id="validationCustomUsername" type="file" required="">
        </div>
        <div class="col-xl-2 col-sm-7">
        <select class="form-control" name="warna[${warna}][status_warna]" id="validationCustomUsername" type="text" required="">
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
        <input class="form-control" name="size[${size}][size_id]" id="validationCustomUsername" placeholder="Size ID" type="text" required="">
        </div>
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="size[${size}][size_en]" id="validationCustomUsername" placeholder="Size EN" type="text" required="">
        </div>
        <div class="col-xl-4 col-sm-7">
        <select class="form-control" name="size[${size}][status_size]" id="validationCustomUsername" type="text" required="">
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
        <input class="form-control" name="link[${link}][judul_link]" id="validationCustomUsername" placeholder="Text Tombol" type="text" required="">
        </div>
        <div class="col-xl-4 col-sm-7">
        <input class="form-control" name="link[${link}][link]" id="validationCustomUsername" placeholder="Link Tujuan" type="text" required="">
        </div>
        <div class="col-xl-3 col-sm-7">
        <select class="form-control" name="link[${link}][target]" id="validationCustomUsername" type="text" required="">
        <option value="">Open In Tab</option>
        <option value="_blank">Open In New Tab</option>
        </select>
        </div>
        <div class="col-xl-2 col-sm-7">
        <select class="form-control" name="link[${link}][status_link]" id="validationCustomUsername" type="text" required="">
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

        var addButton = $('.btn_image'); //Add button selector
        var wrapper = $('#output_imageproduk'); //Input field wrapper
        var fieldHTML = document.getElementById("imageproduk").innerHTML; //New input field html 
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



      function preview_image(event) {
      	var reader = new FileReader();
      	reader.onload = function(){
      		var output = document.getElementById('output_image');
      		output.src = reader.result;
      	}
      	reader.readAsDataURL(event.target.files[0]);
      }
      function preview_image_cover(event) {
      	var reader = new FileReader();
      	reader.onload = function(){
      		var output = document.getElementById('output_image_cover');
      		output.src = reader.result;
      	}
      	reader.readAsDataURL(event.target.files[0]);
      }
    </script>
    <!--ck editor-->
    {{-- <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script> --}}
  </x-guest-layout>