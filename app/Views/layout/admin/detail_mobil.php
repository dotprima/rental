<?= $this->extend('layout/dashboard/template/wrapper') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Detail Mobil</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="col-sm-12">
                            <div class="card shadow">
                                <div class="card-body bg-light text-dark">
                                    <small><?= view('_message_block1') ?></small>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?=base_url()?>/assets/img/mobil/<?=$car["image"]?>" alt=""
                                                class="img-thumbnail mb-4">
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><b><?=$car["nama"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Merk</td>
                                                    <td>:</td>
                                                    <td><b><?=$car["merk"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomer Polisi</td>
                                                    <td>:</td>
                                                    <td><b><?=$car["no_polisi"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Kursi</td>
                                                    <td>:</td>
                                                    <td><b><?=$car["jumlah_kursi"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tahun Beli</td>
                                                    <td>:</td>
                                                    <td><b><?=$car["tahun_beli"]?></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-success " data-toggle="modal"
                                                data-target="#modal-default<?=$car['mobil_id']?>">Edit</button>
                                            <div class="modal fade" id="modal-default<?=$car['mobil_id']?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="modal-default<?=$car['mobil_id']?>" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                    role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-default">Edit Merk
                                                                Mobil
                                                            </h6>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="POST" action="/dashboard/updatemobil"
                                                                enctype="multipart/form-data">
                                                                <input type="hidden" value="<?=$car['mobil_id']?>"
                                                                    name="mobil_id">
                                                                <div class="form-group">
                                                                    <label for="merk">Nama Merk</label>
                                                                    <select name="id_merk" id="merk"
                                                                        class="form-control">
                                                                        <?php foreach ($merk as $merks ):?>
                                                                        <option value="<?=$merks["id"]?>">
                                                                            <?=$merks["merk"]?></option>
                                                                        <?php endforeach?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Mobil</label>
                                                                    <input type="text" name="nama" id="nama"
                                                                        required="required" value="<?=$car['nama']?>"
                                                                        autocomplete="off" class="form-control">
                                                                </div>
                                                                <label for="nama">Harga</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Rp.</span>
                                                                    </div>
                                                                    <input type="text" name="harga" class="form-control"
                                                                        value="<?=$car['harga']?>" aria-label="Username"
                                                                        aria-describedby="basic-addon1">
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="warna">Warna
                                                                            Mobil</label>
                                                                        <input type="text" name="warna" id="warna"
                                                                            required="required"
                                                                            value="<?=$car['warna']?>"
                                                                            autocomplete="off" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="jumlah_kursi">Jumlah
                                                                            Kursi</label>
                                                                        <input type="number" name="jumlah_kursi"
                                                                            id="jumlah_kursi" required="required"
                                                                            value="<?=$car['jumlah_kursi']?>"
                                                                            autocomplete="off" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="no_polisi">No
                                                                            Polisi</label>
                                                                        <input type="text" name="no_polisi"
                                                                            id="no_polisi" required="required"
                                                                            value="<?=$car['no_polisi']?>"
                                                                            autocomplete="off" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="tahun_beli">Tahun
                                                                            Beli</label>
                                                                        <input type="number" name="tahun_beli"
                                                                            id="tahun_beli" required="required"
                                                                            value="<?=$car['tahun_beli']?>"
                                                                            autocomplete="off" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="mobil"
                                                                        class="custom-file-input" id="customFileLang"
                                                                        lang="en">
                                                                    <label class="custom-file-label"
                                                                        for="customFileLang">Select
                                                                        file</label>
                                                                </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                            <button type="button" class="btn btn-link  ml-auto"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <a href="/dashboard/mobil" class="btn btn-sm btn-succsess"><i
                                                    class="fa fa-trash"></i>Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Default browser form validation -->
                        </div>
                    </div>
                </div>
                <?= $this->endSection() ?>