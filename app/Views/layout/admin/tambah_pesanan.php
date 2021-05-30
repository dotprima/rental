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
                        <small><?= view('_message_block1')?></small>
                        <h3 class="mb-0">Tambah Data</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <form method="POST" action="/dashboard/addboking"
                                                enctype="multipart/form-data">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nama">Nama Pemesan</label>
                                                            <input type="text" name="nama_pemesanan" id="nama"
                                                                required="required" placeholder="ketik"
                                                                autocomplete="off" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select name="jk" id="jenis_kelamin" class="form-control">
                                                                <option value="L">Laki laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="merk">Mobil</label>
                                                            <select name="id_mobil" id="merk" class="form-control">
                                                                <?php foreach ($car as $cars ):?>
                                                                <option value="<?=$cars["mobil_id"]?>">
                                                                    <?=$cars["merk"]?> {-}
                                                                    <?=$cars["nama"]?> {-} Rp.
                                                                    <?=$cars["harga"]?></option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jasa Supir</label>
                                                            <select name="supir" id="jenis_kelamin"
                                                                class="form-control">
                                                                <option value="1">Pakai Supir</option>
                                                                <option value="0">Tidak Pakai Supir</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                                            <textarea name="alamat" class="form-control"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nama">Tujuan</label>
                                                            <input type="text" name="tujuan" id="nama"
                                                                required="required" placeholder="ketik"
                                                                autocomplete="off" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-daterange datepicker row align-items-center">
                                                    <div class="col">
                                                        <label for="alamat">Tanggal Mulai</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="ni ni-calendar-grid-58"></i></span>
                                                                </div>
                                                                <input required name="tglmulai" class="form-control"
                                                                    placeholder="Start date" type="text"
                                                                    value="<?=date("m/d/Y")?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="alamat">Tanggal Selesai</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="ni ni-calendar-grid-58"></i></span>
                                                                </div>
                                                                <input required name="tglakhir" class="form-control"
                                                                    placeholder="End date" type="text"
                                                                    value="<?=date("m/d/Y")?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="order">Waktu Older</label>
                                                            <input required name="jammulai" class="form-control"
                                                                type="time" value="<?=date("G:i:s")?>"
                                                                id="example-time-input">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input required class="form-control" name="jamakhir"
                                                                type="hidden" value="<?=date("G:i:s")?>"
                                                                id="example-time-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label for="order">Dokumen</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="customFileLang" lang="en">
                                                    <label class="custom-file-label" for="customFileLang">Select
                                                        file</label>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn btn-success" name="tambah"><i
                                                            class="fa fa-plus"></i> Tambah</button>
                                                    <button type="reset" class="btn btn btn-danger"><i
                                                            class="fa fa-times"></i> Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default browser form validation -->
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>

    <?= $this->section('js') ?>
    <?= $this->endSection() ?>