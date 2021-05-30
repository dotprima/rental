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
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0">Tambah Data Mobil </h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="addmerkmobil" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="text" name="merk" class="form-control"
                                                    placeholder="Default input">
                                                <hr>
                                                <button class="btn btn-icon btn-success" type="submit">
                                                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                                    <span class="btn-inner--text">Simpan Data</span>
                                                </button>
                                                <button class="btn btn-icon btn-danger" type="reset">
                                                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                                    <span class="btn-inner--text">Reset</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="table-responsive">
                                        <div>
                                            <small><?= view('_message_block1') ?></small>
                                            <table class="table align-items-center">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">No</th>
                                                        <th scope="col" class="sort" data-sort="budget">Mobil</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $no = 1 ?>
                                                    <?php foreach ($merk as $merks):?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $merks["merk"] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success "
                                                                data-toggle="modal"
                                                                data-target="#modal-default<?=$merks['id']?>">Edit</button>
                                                            <div class="modal fade" id="modal-default<?=$merks['id']?>"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="modal-default<?=$merks['id']?>"
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
                                                                            <form method="POST"
                                                                                action="updatemerkmobil">
                                                                                <input type="hidden"
                                                                                    value="<?=$merks['id']?>" name="id">
                                                                                <input type="text"
                                                                                    value="<?=$merks['merk']?>"
                                                                                    name="merk" class="form-control"
                                                                                    placeholder="Default input">
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
                                                            <a href="hapusmerk/<?=$merks["id"]?>"
                                                                class="btn btn-sm btn-danger"
                                                                onclick="return confirm('apakah anda yakin?')"><i
                                                                    class="fa fa-trash"></i> Hapus</a>
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