<?= $this->extend('layout/dashboard/template/wrapper') ?>

<?= $this->section('content') ?>
<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">

            <small><?= view('_message_block')?></small>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Cari Orderan</h3>
                    <p class="text-sm mb-0"></p>
                </div>
                <?php if (isset($pesan)):?>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Mobil</th>
                                <th>Tujuan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Mobil</th>
                                <th>Tujuan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                            $full = '';
                            foreach ($pesan as $key ){
                                if($key["status"]=='running'){
                                    $full = true;
                                }
                            }
                            ?>
                            <?php foreach ($pesan as $key ):?>
                            <?php if ($key['status']=='running' || $key['status']=='pending') :?>
                            <tr>
                                <td><?=$key["nama_pemesan"]?></td>
                                <td><?=$key["id_mobil"]?></td>
                                <td><?=$key["tujuan"]?></td>
                                <td><?=$key["tglmulai"]?> - Jam <?=$key["jammulai"]?></td>
                                <td><?=$key["tglakhir"]?> - Jam <?=$key["jamakhir"]?></td>
                                <td>
                                    <?php if ($full) :?>
                                    <?php if ($key["status"]=='running') :?>
                                    <form action="/dashboard/ubahdriverpesan" method="post">
                                        <input type="hidden" name="id" value="<?=$key["id"]?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Batal Jasa</button>
                                    </form>
                                    <?php elseif ($key["status"]=='pending') :?>
                                    <i class="fas fa-times-circle"></i>
                                    <?php endif?>
                                    <?php else:?>
                                    <?php if ($key["status"]=='running') :?>
                                    <form action="/dashboard/ubahdriverpesan" method="post">
                                        <input type="hidden" name="id" value="<?=$key["id"]?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Batal Jasa</button>
                                    </form>
                                    <?php elseif ($key["status"]=='pending') :?>
                                    <form action="/dashboard/konfirmasidriver" method="post">
                                        <input type="hidden" name="id" value="<?=$key["id"]?>">
                                        <button type="submit" class="btn btn-primary btn-sm">Terima Jasa</button>
                                    </form>
                                    <?php endif?>
                                    <?php endif?>
                                </td>
                            </tr>
                            <?php endif?>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Hitory Pesanan</h3>
                    <p class="text-sm mb-0">

                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Mobil</th>
                                <th>Tujuan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Mobil</th>
                                <th>Tujuan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($history as $key ):?>
                            <tr>
                                <td><?=$key["nama_pemesan"]?></td>
                                <td><?=$key["id_mobil"]?></td>
                                <td><?=$key["tujuan"]?></td>
                                <td><?=$key["tglmulai"]?> - Jam <?=$key["jammulai"]?></td>
                                <td><?=$key["tglakhir"]?> - Jam <?=$key["jamakhir"]?></td>
                                <td><?=$key["status"]?></td>
                                <td>
                                    <i class="far fa-check-circle"></i>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
                <?php endif?>
                <h1>Hubungi Administrator</h1>
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