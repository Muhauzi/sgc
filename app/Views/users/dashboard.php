<?= $this->extend('templates/index') ;?>
<?= $this->section('content') ;?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang, <?= user()->username ;?></h1>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ;?>