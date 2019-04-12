<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Regions</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data region
                <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            </div>
            <div class="col-lg-10">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <form class="search-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" name="cari" id="cari" class="form-control border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2">
                <a href="<?= base_url(); ?>region/tambah" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table Regions</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php  
                                $no = $this->uri->segment(3) + 1;
                                foreach ($region as $key) :
                            ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $key['name']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>region/hapus/<?= $key['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</a>
                                        <a href="<?= base_url(); ?>region/edit/<?= $key['id']; ?>" class="badge badge-warning float-right">Edit</a>
                                        <a href="<?= base_url(); ?>region/detail/<?= $key['id']; ?>" class="badge badge-success float-right">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php  
                                endforeach;
                            ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <?php echo $pagination; ?>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- .content -->