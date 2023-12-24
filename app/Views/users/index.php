<?= $this->extend('users/templates/template') ;?>
<?= $this->section('content') ;?>
<!-- Begin Page Content -->
<div class="container-fluid px-0">

    <div class="row">

        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary">

            <!-- Card Header -->
            <div class="list-header d-flex justify-content-center align-items-center flex-shrink-0 p-3">
                <h3>Daftar Toko</h3>
            </div>

            <!-- Card List -->
            <div class="list-group list-group-flush border-bottom scrollarea">

                <div class="card my-3 ml-4 mr-3 border border-dark">
                    <div class="row g-0">
                        <div class="card-img col-md-4">
                            <img src="<?= base_url(); ?>/img/toko[1].jpg" alt="image toko">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nama Toko</h5>
                                <p class="card-text lh-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, blanditiis similique dicta dolores doloremque obcaecati?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->

    </div> <!-- .row -->

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ;?>