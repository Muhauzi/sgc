<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ProdukModel extends Model {
        protected $table = 'produk_toko';
        protected $primaryKey = 'id_produk';
        protected $allowedFields = ['nama_produk', 'foto_produk', 'harga_produk', 'stok_produk', 'tersedia', 'id_toko'];

        public function getProduk($id = false) {
            if ($id === false) {
                return $this->findAll();
            }

            return $this->where(['id_produk' => $id])->first();
        }
        
        public function getProdukWithFullname() {
            $this->join('tokos', 'produk_toko.id_user = tokos.id_toko');

            return $this->findAll();
        }

        public function saveProduk($namaProduk, $foto_produk, $harga_produk, $stok_produk, $tersedia, $idToko) {
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
    }
?>