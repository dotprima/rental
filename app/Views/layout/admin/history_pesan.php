<?= $this->extend('layout/dashboard/template/wrapper') ?>

<?= $this->section('content') ?>

<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function selisih($tglmulai,$tglakhir,$harga){
    date_default_timezone_set('Asia/Jakarta');
    $tglmulai = new DateTime($tglmulai);
    $tglakhir = new DateTime($tglakhir);
    $hasil = $tglmulai->diff($tglakhir)->format('%R%a');
    $positive = substr($hasil,0,1);
    $jmlhhari = substr($hasil,1);
    if ($positive =='+') {
    return $jmlhbayar = $harga*$jmlhhari;
    }else{
        return NULL;
    }                              
}

function cekdenda($tglakhir,$now,$harga){
    date_default_timezone_set('Asia/Jakarta');
    $tglakhir = new DateTime($tglakhir);
    $now = new DateTime($now);
    $hasil = $tglakhir->diff($now)->format('%R%a');
    $negative = substr($hasil,0,1);
    $jmlhhari = substr($hasil,1);
    if ($negative =='-') {
        return $jmlhbayar = $harga*$jmlhhari;
    }else{
        return NULL;
    }                              
}

function booleandenda($tglakhir,$now,$harga){
    date_default_timezone_set('Asia/Jakarta');
    $tglakhir = new DateTime($tglakhir);
    $now = new DateTime($now);
    $hasil = $tglakhir->diff($now)->format('%R%a');
    $negative = substr($hasil,0,1);
    $jmlhhari = substr($hasil,1);
    if ($negative =='-') {
        return true;
    }else{
        return false;
    }                              
}


?>
<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <small><?= view('_message_block1')?></small>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Orderan Menunggu Driver</h3>
                    <p class="text-sm mb-0">

                    </p>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Mobil</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-light">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Mobil</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($pending as $key ):?>
                                <tr>
                                    <td><?=$key["nama_pemesan"]?></td>
                                    <td><?=$key["id_mobil"]?></td>
                                    <td><?=$key["tujuan"]?></td>
                                    <td><?=$key["tglmulai"]?> - Jam <?=$key["jammulai"]?></td>
                                    <td><?=$key["tglakhir"]?> - Jam <?=$key["jamakhir"]?></td>
                                    <td>RP.500.000</td>
                                    <td><?=$key["status"]?></td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Orderan Berjalan Dengan Supir</h3>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Mobil</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Driver</th>
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
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Driver</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($pesan as $key ):?>
                                <?php 
                                  $jmlhbayar = selisih($key['tglmulai'],$key['tglakhir'],$key['harga']);
                                  $denda =  cekdenda($date,$key['tglakhir'],$key['harga']);
                                  echo Rupiah(cekdenda($date,$key['tglakhir'],$key['harga']));
                                  if(cekdenda($date,$key['tglakhir'],$key['harga'])){
                                    $red = 'table-danger';
                                  }else {
                                    $red = '';
                                  }
                                ?>

                                <tr class="<?=$red?>">
                                    <?php if ($key["status_pesan"]=='running') :?>
                                    <td><?=$key["nama_pemesan"]?></td>
                                    <td><?=$key["nama"]?></td>
                                    <td><?=$key["tujuan"]?></td>
                                    <td><?=$key["tglmulai"]?> - Jam <?=$key["jammulai"]?></td>
                                    <td><?=$key["tglakhir"]?> - Jam <?=$key["jamakhir"]?></td>
                                    <td><?=rupiah($jmlhbayar)?></td>
                                    <td><?=$key["status_pesan"]?></td>
                                    <td><?=$key["fullname"]?></td>
                                    <?php if ($key["status_pesan"]=='running') :?>
                                    <td>
                                        <form action="/dashboard/konfirmasibayar" method="post">
                                            <input type="hidden" name="tanggalbayar" value="<?=$date?>">
                                            <input type="hidden" name="id" value="<?=$key["id_pesan"]?>">
                                            <input type="hidden" name="jumlahbayar"
                                                value="<?=$temp = intval($jmlhbayar)+intval($denda)?>">
                                            <button type="submit" class="btn btn-primary btn-sm">Terima Uang</button>
                                        </form>
                                    </td>
                                    <?php endif?>
                                    <?php endif?>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Orderan Berjalan Tanpa Supir</h3>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Mobil</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Harga</th>
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
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($nodriver as $key ):?>
                                <tr>
                                    <td><?=$key["nama_pemesan"]?></td>
                                    <td><?=$key["id_mobil"]?></td>
                                    <td><?=$key["tujuan"]?></td>
                                    <td><?=$key["tglmulai"]?> - Jam <?=$key["jammulai"]?></td>
                                    <td><?=$key["tglakhir"]?> - Jam <?=$key["jamakhir"]?></td>
                                    <td>RP.500.000</td>
                                    <td><?=$key["status"]?></td>
                                    <?php if ($key["status"]=='running') :?>
                                    <td>
                                        <form action="/dashboard/konfirmasidriver" method="post">
                                            <input type="hidden" name="tanggalbayar" value="<?=$date?>">
                                            <input type="hidden" name="id" value="<?=$key["id"]?>">
                                            <input type="hidden" name="jumlahbayar"
                                                value="<?=$temp = intval($jmlhbayar)+intval($denda)?>">
                                            <button type="submit" class="btn btn-primary btn-sm">Terima Uang</button>
                                        </form>
                                    </td>
                                    <?php endif?>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>