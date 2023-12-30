<?= $this->extend('users/keranjang/templates/template') ;?>
<?= $this->section('content') ;?>

<div class="main container-fluid p-4 overflow-auto">
    <h3 class="fw-bold text-black mb-3">Checkout Pesanan</h3>

    <div class="table-responsive">
        <table class="table table-sm table-borderless">
            <thead class="text-center table-dark">
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Harga Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td scope="col">
                        <div class="d-inline-flex flex-column justify-content-center my-3">
                            <img src="<?= base_url() ?>/img/asset[1].jpg" class="img-fluid rounded mb-1">
                            <button class="btn bg-green text-white p-1">Catatan</button>
                        </div>
                    </td>
                    <td scope="col">Mie Ayam</td>
                    <td scope="col">Mie Ayam Asoka</td>
                    <td scope="col">Rp. 12.000</td>
                    <td scope="col">
                        <input type="number">
                    </td>
                    <td scope="col">Rp. 12.000</td>
                    <td scope="col">
                        <span class="d-flex justify-content-center">
                            <i class="fa-solid fa-trash"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        <div class="d-inline-flex flex-column justify-content-center my-3">
                            <img src="<?= base_url() ?>/img/asset[1].jpg" class="img-fluid rounded mb-1">
                            <button class="btn bg-green text-white p-1">Catatan</button>
                        </div>
                    </td>
                    <td scope="col">Mie Ayam</td>
                    <td scope="col">Mie Ayam Asoka</td>
                    <td scope="col">Rp. 12.000</td>
                    <td scope="col">
                        <input type="number">
                    </td>
                    <td scope="col">Rp. 12.000</td>
                    <td scope="col">
                        <span class="d-flex justify-content-center">
                            <i class="fa-solid fa-trash"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        <div class="d-inline-flex flex-column justify-content-center my-3">
                            <img src="<?= base_url() ?>/img/asset[1].jpg" class="img-fluid rounded mb-1">
                            <button class="btn bg-green text-white p-1">Catatan</button>
                        </div>
                    </td>
                    <td scope="col">Mie Ayam</td>
                    <td scope="col">Mie Ayam Asoka</td>
                    <td scope="col">Rp. 12.000</td>
                    <td scope="col">
                        <input type="number">
                    </td>
                    <td scope="col">Rp. 12.000</td>
                    <td scope="col">
                        <span class="d-flex justify-content-center">
                            <i class="fa-solid fa-trash"></i>
                        </span>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td class="border-bottom border-dark text-end pt-3">Total Harga</td>
                    <td class="border-bottom border-dark text-center pt-3">Rp. 24.000</td>
                </tr>
                <tr>
                    <td>
                        <a href="<?= base_url('user') ?>" class="btn bg-green text-white mt-3">Pesan Kembali</a>
                    </td>
                    <td colspan="4"></td>
                    <td colspan="2" class="d-flex justify-content-end">
                        <a href="#" class="btn bg-green text-white mt-3">Selesaikan Pembayaran</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?= $this->endSection() ;?>