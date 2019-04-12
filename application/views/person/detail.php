<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Person/Penduduk</h1>
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
                                <label class=" form-control-label">Nama Penduduk</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $detail['name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Asal Daerah</label>
                                <div class="input-group">
                                    <?php foreach ($option_region as $op) : ?>
                                        <?php if ($op['id'] == $detail['region_id']) : ?>
                                        <input type="text" name="region" id="region" class="form-control" value="<?php echo $op['name'];?>" readonly>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Gaji</label>
                                <div class="input-group">
                                    <input type="text" name="gaji" id="gaji" class="form-control" value="<?= "Rp. ".number_format($detail['income'],0,',','.'); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="alamat" id="alamat" readonly><?php echo $detail['address']; ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url(); ?>person/index"><button type="button" class="d-none d-sm-inline-block btn btn-secondary shadow">Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->