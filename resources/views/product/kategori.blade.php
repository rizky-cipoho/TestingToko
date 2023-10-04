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

                        <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Sub
                        Category</button>
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
                                    <tr>
                                        <td data-field="price"></td>
                                        <td data-field="name"></td>
                                        <td data-field="name"></td>

                                        <td class="order-success" data-field="status">
                                            <span></span>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-edit" title="Edit"></i>
                                            </a>

                                            <a href="javascript:void(0)">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>
                                        </td>
                                    </tr>

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
            <h5 class="modal-title f-w-600" id="exampleModalLabel">Add
            Physical Product</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">×</span></button>
            </div>
            <form class="needs-validation" method="POST" action="#">
                <div class="modal-body">

                    <?php include './views/produk/proses/input-kategori.php'; ?>
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Kategori ID :</label>
                            <input class="form-control" name="kategori_id" id="validationCustom01" type="text">
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Kategori EN :</label>
                            <input class="form-control" name="kategori_en" id="validationCustom01" type="text">
                        </div>
                        <div class="form-group mb-0">
                            <label for="validationCustom02" class="mb-1">Satus :</label>
                            <select class="form-control" name="status">
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