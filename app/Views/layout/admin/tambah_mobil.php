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
                        <h3 class="mb-0">Custom styles</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="mb-0">
                                    For custom form validation messages, you’ll need to add the novalidate boolean
                                    attribute to your <code>&lt;form&gt;</code>. This disables the browser default
                                    feedback tooltips, but still provides access to the form
                                    validation APIs in JavaScript.
                                    <br /><br />
                                    When attempting to submit, you’ll see the<code>:invalid</code> and
                                    <code>:valid</code> styles applied to your form controls.
                                </p>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0">Tambah Data</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="addmobil" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="merk">Nama Merk</label>
                                                <select name="id_merk" id="merk" class="form-control">
                                                    <?php foreach ($merk as $merks ):?>
                                                    <option value="<?=$merks["id"]?>"><?=$merks["merk"]?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Mobil</label>
                                                <input type="text" name="nama" id="nama" required="required"
                                                    placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                            <label for="nama">Harga</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" name="harga" class="form-control" placeholder="Harga"
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="warna">Warna Mobil</label>
                                                    <input type="text" name="warna" id="warna" required="required"
                                                        placeholder="ketik" autocomplete="off" class="form-control">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="jumlah_kursi">Jumlah Kursi</label>
                                                    <input type="number" name="jumlah_kursi" id="jumlah_kursi"
                                                        required="required" placeholder="ketik" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="no_polisi">No Polisi</label>
                                                    <input type="text" name="no_polisi" id="no_polisi"
                                                        required="required" placeholder="ketik" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="tahun_beli">Tahun Beli</label>
                                                    <input type="number" name="tahun_beli" id="tahun_beli"
                                                        required="required" placeholder="ketik" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLang"
                                                    lang="en">
                                                <label class="custom-file-label" for="customFileLang">Select
                                                    file</label>
                                            </div>
                                            <div class="form-group">
                                                <hr>
                                                <button type="submit" class="btn btn btn-success" name="tambah"><i
                                                        class="fa fa-plus"></i> Tambah</button>
                                                <button type="reset" class="btn btn btn-danger"><i
                                                        class="fa fa-times"></i> Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card shadow">
                                    <div class="table-responsive">
                                        <div>
                                            <small><?= view('_message_block1') ?></small>
                                            <table class="table align-items-center">
                                                <thead class="thead-light">
                                                    <tr>

                                                        <th scope="col" class="sort" data-sort="status">Merk</th>
                                                        <th scope="col" class="sort" data-sort="budget">Mobil</th>
                                                        <th scope="col" class="sort" data-sort="budget">Harga/th>
                                                        <th scope="col" class="sort" data-sort="completion">No Polisi
                                                        </th>
                                                        <th scope="col">Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $no = 1 ?>
                                                    <?php foreach ($car as $cars):?>
                                                    <tr>

                                                        <td><?= $cars["merk"] ?></td>
                                                        <td><?= $cars["harga"] ?></td>
                                                        <td><?= $cars["nama"] ?></td>
                                                        <td><?= $cars["no_polisi"] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success "
                                                                data-toggle="modal"
                                                                data-target="#modal-default<?=$cars['mobil_id']?>">Edit</button>
                                                            <div class="modal fade"
                                                                id="modal-default<?=$cars['mobil_id']?>" tabindex="-1"
                                                                role="dialog"
                                                                aria-labelledby="modal-default<?=$cars['mobil_id']?>"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                                    role="document">
                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title"
                                                                                id="modal-title-default">Edit Merk Mobil
                                                                            </h6>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form method="POST" action="updatemobil">
                                                                                <input type="hidden"
                                                                                    value="<?=$cars['mobil_id']?>"
                                                                                    name="mobil_id">
                                                                                <div class="form-group">
                                                                                    <label for="merk">Nama Merk</label>
                                                                                    <select name="id_merk" id="merk"
                                                                                        class="form-control">
                                                                                        <?php foreach ($merk as $merks ):?>
                                                                                        <option
                                                                                            value="<?=$merks["id"]?>">
                                                                                            <?=$merks["merk"]?></option>
                                                                                        <?php endforeach?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="nama">Nama Mobil</label>
                                                                                    <input type="text" name="nama"
                                                                                        id="nama" required="required"
                                                                                        value="<?=$cars['nama']?>"
                                                                                        autocomplete="off"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <label for="nama">Harga</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"
                                                                                            id="basic-addon1">Rp.</span>
                                                                                    </div>
                                                                                    <input type="text" name="harga"
                                                                                        class="form-control"
                                                                                        value="<?=$cars['harga']?>"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="form-group col-6">
                                                                                        <label for="warna">Warna
                                                                                            Mobil</label>
                                                                                        <input type="text" name="warna"
                                                                                            id="warna"
                                                                                            required="required"
                                                                                            value="<?=$cars['warna']?>"
                                                                                            autocomplete="off"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group col-6">
                                                                                        <label for="jumlah_kursi">Jumlah
                                                                                            Kursi</label>
                                                                                        <input type="number"
                                                                                            name="jumlah_kursi"
                                                                                            id="jumlah_kursi"
                                                                                            required="required"
                                                                                            value="<?=$cars['jumlah_kursi']?>"
                                                                                            autocomplete="off"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="form-group col-6">
                                                                                        <label for="no_polisi">No
                                                                                            Polisi</label>
                                                                                        <input type="text"
                                                                                            name="no_polisi"
                                                                                            id="no_polisi"
                                                                                            required="required"
                                                                                            value="<?=$cars['no_polisi']?>"
                                                                                            autocomplete="off"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group col-6">
                                                                                        <label for="tahun_beli">Tahun
                                                                                            Beli</label>
                                                                                        <input type="number"
                                                                                            name="tahun_beli"
                                                                                            id="tahun_beli"
                                                                                            required="required"
                                                                                            value="<?=$cars['tahun_beli']?>"
                                                                                            autocomplete="off"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="custom-file">
                                                                                    <input type="file"
                                                                                        class="custom-file-input"
                                                                                        id="customFileLang" lang="en">
                                                                                    <label class="custom-file-label"
                                                                                        for="customFileLang">Select
                                                                                        file</label>
                                                                                </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                            <button type="button"
                                                                                class="btn btn-link  ml-auto"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="detailmobil/<?=$cars["mobil_id"]?>"
                                                                class="btn btn-sm btn-info"><i
                                                                    class="fa fa-trash"></i>Detail</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
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