<?php if (in_groups('user')==true):?>
<?= $this->include('layout/dashboard/template/nav/nav_user') ?>
<?php elseif(in_groups('admin')==true):?>
<?= $this->include('layout/dashboard/template/nav/nav_admin') ?>
<?php elseif(in_groups('superadmin')==true):?>
<?= $this->include('layout/dashboard/template/nav/nav_superadmin') ?>
<?php endif?>