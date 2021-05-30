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
                        <h3 class="mb-0">Supir</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <small><?= view('_message_block')?></small>
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">No</th>
                                                <th scope="col" class="sort" data-sort="budget">Nama</th>
                                                <th scope="col" class="sort" data-sort="status">No Hp</th>
                                                <th scope="col">Profile</th>
                                                <th scope="col" class="sort" data-sort="completion">Penghasilan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $a= 0;
                                            $s =0;
                                        ?>
                                            <?php foreach ($supir as $key ):?>
                                            <tr>
                                                <th scope="row">
                                                    <?=$a=$a+1?>
                                                </th>
                                                <td class="budget">
                                                    <?=$key->id?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-danger"></i>
                                                        <span class="status"> <?=$key->notelepon?></span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                            <img alt="Image placeholder"
                                                                src="<?=base_url()?>/assets/img/user/<?=user()->image?>">
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm"><?=$key->fullname?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="completion mr-2">72%</span>
                                                        <div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    aria-valuenow="72" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 72%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/dashboard/changeuser" method="post">
                                                        <input type="hidden" name="id" value="<?=$key->id?>">
                                                        <button type="submit" class="btn btn-primary btn-sm">Jadikan
                                                            User</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">User</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <small><?= view('_message_block')?></small>
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">No</th>
                                                <th scope="col" class="sort" data-sort="budget">ID</th>
                                                <th scope="col" class="sort" data-sort="status">No Hp</th>
                                                <th scope="col">Profile</th>
                                                <th scope="col" class="sort" data-sort="completion">Penghasilan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php foreach ($user as $key ):?>
                                            <tr>
                                                <th scope="row">
                                                    <?=$s=$s+1?>
                                                </th>
                                                <td class="budget">
                                                    <?=$key->id?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-danger"></i>
                                                        <span class="status"> <?=$key->notelepon?></span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                            <img alt="Image placeholder"
                                                                src="<?=base_url()?>/assets/img/user/<?=user()->image?>">
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm"><?=$key->fullname?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="completion mr-2">72%</span>
                                                        <div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    aria-valuenow="72" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 72%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/dashboard/changeuser" method="post">
                                                        <input type="hidden" name="id" value="<?=$key->id?>">
                                                        <button type="submit" class="btn btn-primary btn-sm">Jadikan
                                                            Supir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
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
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
    </script>
    <?= $this->endSection() ?>