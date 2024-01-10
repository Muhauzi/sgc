<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ProdukModel extends Model {
        protected $table = 'produk_toko';
        protected $primaryKey = 'id_produk';
        protected $allowedFields = ['id_product','nama_produk', 'foto_produk', 'deskripsi_produk', 'harga_produk', 'stok_produk', 'tersedia', 'id_toko'];

        public function getProduk($id = false) {
            if ($id === false) {
                return $this->findAll();
            }

            return $this->where(['id_produk' => $id])->first();
        }
        
        public function getProdukWithFullname() {
            $this->join('toko', 'produk_toko.id_user = toko.id_toko');

            return $this->findAll();
        }

        public function saveProduk($namaProduk, $foto_produk, $deskripsi_Produk, $harga_produk, $stok_produk, $tersedia, $idToko) {
            $data = [
                'nama_produk' => $namaProduk,
                'foto_produk' => $foto_produk,
                'stok_produk' => $stok_produk,
                'harga_produk' => $harga_produk,
                'tersedia' => $tersedia,
                'id_toko' => $idToko
            ];

            return $this->insert($data);
        }

        public function updateProduk($id, $namaProduk, $foto_produk, $deskripsi_Produk, $harga_produk, $stok_produk, $tersedia, $idToko) {
            $data = [
                'id_produk' => $id, // tambahkan ini untuk menghindari error 'id_produk tidak boleh kosong
                'nama_produk' => $namaProduk,
                'foto_produk' => $foto_produk,
                'deskripsi_produk' => $deskripsi_Produk,
                'harga_produk' => $harga_produk,
                'stok_produk' => $stok_produk,
                'tersedia' => $tersedia,
                'id_toko' => $idToko
            ];

            return $this->update($id, $data);
        }

        public function deleteProduk($id) {
            return $this->delete($id);
        }

        public function getProdukByTokoId($id) {
            return $this->where(['id_toko' => $id])->findAll();
        }

        public function getProdukByUserId($id) {
            return $this->where(['id_user' => $id])->findAll();
        }

        public function getProdukWithFullnameById($id) {
            $this->join('toko', 'produk_toko.id_toko = toko.id_toko');

            return $this->where(['id_produk' => $id])->first();
        }
    }
?>