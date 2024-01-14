<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class TokoModel extends Model {
        protected $table = 'toko';
        protected $primaryKey = 'id_toko';
        protected $allowedFields = ['nama_toko', 'alamat_toko', 'deskripsi', 'foto', 'nohp_toko', 'user_id'];

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

        public function getTokoWithFullnameById($id) {
            $this->join('users', 'toko.user_id = users.id');

            return $this->where(['id_toko' => $id])->first();
        }

        public function getTokoByUserId($id) {
            return $this->where(['user_id' => $id])->first();
        }

        public function saveToko($namaToko, $alamatToko, $deskripsiToko, $fotoToko, $nohpToko, $idUser) {
            $data = [
                'nama_toko' => $namaToko,
                'alamat_toko' => $alamatToko,
                'deskripsi' => $deskripsiToko,
                'foto' => $fotoToko,
                'nohp_toko' => $nohpToko,
                'user_id' => $idUser
            ];

            return $this->insert($data);
        }

        public function updateToko($idToko, $namaToko, $alamatToko, $deskripsiToko, $fotoToko, $nohpToko, $idUser) {
            $data = [
                'nama_toko' => $namaToko,
                'alamat_toko' => $alamatToko,
                'deskripsi' => $deskripsiToko,
                'foto' => $fotoToko,
                'nohp_toko' => $nohpToko,
            ];

            return $this->update($idToko, $data);
        }

        public function checkToko($idUser) {
            return $this->where(['user_id' => $idUser])->first();
        }
    }
?>