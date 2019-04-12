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
                        <strong>Form Detail Data</strong>
                    </div>
                    <div class="card-body mx-auto">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class=" form-control-label">ID</label>
                                <div class="input-group">
                                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $detail['id']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama Region</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $detail['name'] ?>" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url(); ?>region/index"><button type="button" class="d-none d-sm-inline-block btn btn-secondary shadow">Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->