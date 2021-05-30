<?php if (session()->has('message')) : ?>
<div class="alert alert-success">
    Data berhasil di update
</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
<div class="alert alert-danger">
    Kata sandi salah
</div>
<?php endif ?>

<?php if (session()->has('errorupload')) : ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Upload Gambar Error</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-fat-remove ni-5x"></i>
                    <h4 class="heading mt-4">You should read this!</h4>
                    <p>Upload Gambar Error</p>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-white" data-toggle="modal"
                    data-target="#exampleModal">Upload Again</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php endif ?>
<?php if (session()->has('errorchange')) : ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Penggantian Role User Gagal</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-fat-remove ni-5x"></i>
                    <h4 class="heading mt-4">You should read this!</h4>
                    <p>Penggantian Role User Gagal</p>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-white" data-toggle="modal"
                    data-target="#exampleModal">Upload Again</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php endif ?>
<?php if (session()->has('upload')) : ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-success">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Upload Gambar Berhasil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-check-bold ni-5x"></i>
                    <h4 class="heading mt-4">You should read this!</h4>
                    <p>Upload Gambar Berhasil</p>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-white" data-toggle="modal"
                    data-target="#exampleModal">Upload Again</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php endif ?>

<?php if (session()->has('change')) : ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-success">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Ganti Role User Berhasil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-check-bold ni-5x"></i>
                    <h4 class="heading mt-4">You should read this!</h4>
                    <p>Ganti Role User Berhasil</p>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-white" data-toggle="modal"
                    data-target="#exampleModal">Upload Again</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
<ul class="alert alert-danger">
    <?php foreach (session('errors') as $error) : ?>
    <li><?= $error ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>