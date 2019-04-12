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
                        <strong>Form Edit Data</strong>
                    </div>
                    <div class="card-body mx-auto">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Penduduk</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id" value="<?= $person['id'] ?>">
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $person['name'] ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('name'); ?></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Asal Daerah</label>
                                <div class="input-group">
                                    <select class="form-control" name="daerah" id="daerah">
                                        <?php foreach ($option_region as $op) : ?>
                                            <?php if ($op['id'] == $person['region_id']) : ?>
                                            <option value="<?php echo $op['id'] ?>" selected><?php echo $op['name'] ?></option>
                                            <?php else : ?>
                                            <option value="<?php echo $op['id'] ?>"><?php echo $op['name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="form-text text-danger"><?= form_error('daerah'); ?></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Gaji</label>
                                <div class="input-group">
                                    <input type="text" name="gaji" id="gaji" class="form-control" value="<?php echo "Rp. ".number_format($person['income'],0,',','.'); ?>">
                                </div>
                                <small class="form-text text-danger"><?= form_error('gaji'); ?></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="alamat" id="alamat"><?php echo $person['address']; ?></textarea>
                                </div>
                                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url(); ?>person/index"><button type="button" class="d-none d-sm-inline-block btn btn-secondary shadow">Back</button></a>
                                <button type="submit" value="tambah" name="tambah" class="d-none d-inline-block btn btn-primary shadow">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->