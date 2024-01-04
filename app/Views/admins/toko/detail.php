<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-8">
                        <div class="card-body my-md-3">
                            <h2 class="text-center" >Informasi Toko</h2>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">Nama Toko</th>
                                    <td>:</td>
                                    <td>
                                        <?= $toko['nama_toko']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Nama Pemilik</th>
                                    <td>:</td>
                                    <td>
                                        <?= $pemilik['fullname']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Alamat Toko</th>
                                    <td>:</td>
                                    <td>
                                        <?= $toko['alamat_toko']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">No HP Toko</th>
                                    <td>:</td>
                                    <td>
                                        <?= $toko['nohp_toko']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Deskripsi Toko</th>
                                    <td>:</td>
                                    <td>
                                        <?= $toko['deskripsi']; ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-info mr-2" href="<?= base_url('admin/edit_toko/' . $toko['id_toko']); ?>">Edit</a>
                                <a href="<?= base_url('/admin/toko'); ?>" class="btn btn-primary ml-2">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>