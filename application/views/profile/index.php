<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>My Profile</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data penduduk
                <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            </div>
            <div class="col-sm-12">
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="<?= base_url(); ?>assets/images/profile/<?php echo $user['image'] ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $user['name']; ?></h5>
                        <p class="card-text"><?php echo $user['email']; ?></p>
                        <p class="card-text"><small class="text-muted">Member since <?php echo date('d M Y', strtotime($user['created_at'])); ?></small></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- .content -->