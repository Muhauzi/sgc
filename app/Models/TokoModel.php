<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class TokoModel extends Model {
        protected $table = 'toko';
        protected $primaryKey = 'id_toko';
        protected $allowedFields = ['nama_toko', 'alamat_toko', 'deskripsi', 'nohp_toko', 'user_id'];

        public function getToko($id = false) {
            if ($id === false) {
                return $this->findAll();
            }

            return $this->where(['id_toko' => $id])->first();
        }
        
        public function getTokoWithFullname() {
            $this->join('users', 'toko.user_id = users.id');

            return $this->findAll();
        }

        public function saveToko($namaToko, $alamatToko, $deskripsiToko, $nohpToko, $idUser) {
            $data = [
                'nama_toko' => $namaToko,
                'alamat_toko' => $alamatToko,
                'deskripsi' => $deskripsiToko,
                'nohp_toko' => $nohpToko,
                'user_id' => $idUser
            ];

            return $this->insert($data);
        }
    }
?>