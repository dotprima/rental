<?= $this->extend('layout/dashboard/template/wrapper') ?>

<?= $this->section('content') ?>
<?php 
if (in_groups('user')==true){
    $role="USER";
}elseif(in_groups('admin')==true){
    $role="ADMIN";
}elseif(in_groups('superadmin')==true){
    $role="SUPER ADMIN";
}
?>


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-6">
            <div class="card-wrapper">
                <!-- Profile image-->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <a href="#!">
                            <img src="<?=base_url()?>/assets/img/user/<?=user()->image?>"
                                class=" img-center img-fluid shadow shadow-lg--hover" style="width: 140px;">
                        </a>
                        <div class="pt-4 text-center">
                            <h5 class="h3 title">
                                <span class="d-block mb-1"><?=user()->fullname?></span>
                                <small class="h4 font-weight-light text-muted"><?=$role?></small>
                            </h5>
                            <div class="mt-3">
                                <a href="#" class="btn btn-twitter btn-icon-only rounded-circle">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-facebook btn-icon-only rounded-circle">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#" class="btn btn-dribbble btn-icon-only rounded-circle">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Ubah gambar profile
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Drop file here</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="addprofileimage" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <input type="hidden" value="<?=user_id()?>" name="id">
                                                            <div class="custom-file">
                                                                <input type="file" name="avatar" accept="image/*"
                                                                    required class="custom-file-input"
                                                                    id="customFileLang" lang="en">
                                                                <label class="custom-file-label"
                                                                    for="customFileLang">Select file</label>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-wrapper">
                <!-- Input groups -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit User</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <small><?= view('_message_block') ?></small>
                        <form action="editprofil" method="post">
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control" name="fullname" value="<?=user()->fullname?>"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input class="form-control" name="email" value="<?=user()->email?>"
                                                type="email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" name="username" value="<?=user()->username?>"
                                                type="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password"
                                            class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?=lang('Auth.password')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Payment method" type="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><small
                                                        class="font-weight-bold">USD</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-globe-americas"></i></span>
                                            </div>
                                            <input class="form-control" name="notelepon" value="<?=user()->notelepon?>"
                                                type="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden"
                                class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" value="<?=user()->username?>">
                            </input>
                            <input type="hidden"
                                class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="id" value="<?=user_id()?>">
                            </input>
                            <div class="mt-3 text-center">
                                <button class="btn btn-icon btn-primary" name="edit_profil" type="submit">
                                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                    <span class="btn-inner--text">Simpan Pengaturan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit Kata Sandi</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <small><?= view('_message_block1') ?></small>
                        <form action="editpassword" method="post">
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password"
                                            class="form-control  <?php if(session('errors1.password')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?=lang('Auth.password')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="pw1" class="form-control "
                                            placeholder="<?=lang('Auth.password')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="pw2" class="form-control  "
                                            placeholder="<?=lang('Auth.password')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden"
                                class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="id" value="<?=user_id()?>">
                            </input>
                            <input type="hidden"
                                class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" value="<?=user()->username?>">
                            </input>
                            <div class="mt-3 text-center">
                                <button class="btn btn-icon btn-primary" name="edit_pw" type="submit">
                                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                    <span class="btn-inner--text">Simpan Pengaturan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $this->endSection() ?>


    <?= $this->section('js') ?>
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
    </script>
    <?= $this->endSection() ?>