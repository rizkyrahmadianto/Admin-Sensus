<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-3">

    <div class="col-sm-12">
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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Daerah</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Daerah</th>
                                <th>Id</th>
                                <th>Jumlah Penduduk</th>
                                <th>Total Pendapatan</th>
                                <th>Rata-Rata Pendapatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php  
                            $no = $this->uri->segment(3) + 1;
                            foreach ($data as $key) :
                        ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $key['regname']; ?></td>
                                <td><?= $key['regid']; ?></td>
                                <td><?= $key['jumlah']; ?></td>
                                <td><?= $key['total']; ?></td>
                                <td><?= $key['rata_rata']; ?></td>
                                <td>
                                    <?php  
                                        if ($key['rata_rata'] > 2200000) {
                                            echo '<span class="badge badge-success">Bagus</span>';
                                        } else if (($key['rata_rata'] > 1700000) && ($key['rata_rata'] < 2200000)) {
                                            echo '<span class="badge badge-warning">Cukup Bagus</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Bahaya</span>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php  
                            endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php echo $pagination; ?>
          </div>
        </div>
    </div>

</div> <!-- .content -->