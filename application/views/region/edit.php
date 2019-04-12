<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Regions</h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-3">
    <div class="animated fadeIn">

        <div class="row">

            <div class="mx-auto">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Edit Data</strong>
                    </div>
                    <div class="card-body mx-auto">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Region</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $region['id'] ?>">
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $region['name']; ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('name'); ?></small>
                                <small class="form-text text-warning"><?= $name_result; ?></small>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url(); ?>region/index"><button type="button" class="d-none d-sm-inline-block btn btn-secondary shadow">Back</button></a>
                                <button type="submit" value="update" name="update" class="d-none d-inline-block btn btn-primary shadow">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->