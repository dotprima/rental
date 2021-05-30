<?php if (session()->has('message1')) : ?>
<div class="alert alert-success">
    Data berhasil di update
</div>
<?php endif ?>

<?php if (session()->has('input')) : ?>
<div class="alert alert-success">
    Data berhasil di masukan
</div>
<?php endif ?>

<?php if (session()->has('update')) : ?>
<div class="alert alert-success">
    Data berhasil di update
</div>
<?php endif ?>

<?php if (session()->has('error1')) : ?>
<div class="alert alert-danger">
    Kata sandi lama salah
</div>
<?php endif ?>

<?php if (session()->has('error2')) : ?>
<div class="alert alert-danger">
    Data Gagal Di ubah
</div>
<?php endif ?>

<?php if (session()->has('notfound')) : ?>
<div class="alert alert-danger">
    Data Tidak Ada
</div>
<?php endif ?>

<?php if (session()->has('same')) : ?>
<div class="alert alert-danger">
    kata sandi baru tidak cocok
</div>
<?php endif ?>

<?php if (session()->has('errors1')) : ?>
<ul class="alert alert-danger">
    <?php foreach (session('errors1') as $error) : ?>
    <li><?= $error ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>