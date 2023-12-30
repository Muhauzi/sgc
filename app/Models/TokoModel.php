<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'toko';
    protected $allowedFields = ['nama_toko', 'alamat_toko', 'telepon_toko', 'id_user'];

    public function getToko($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    
    public function getTokoWithFullname()
    {
        $this->join('users', 'toko.id_user = users.id');

        return $this->findAll();
    }

    public function saveToko($namaToko, $alamatToko, $nohpToko, $idUser)
    {
        $data = [
            'nama_toko' => $namaToko,
            'alamat_toko' => $alamatToko,
            'telepon_toko' => $nohpToko,
            'id_user' => $idUser
        ];

        return $this->insert($data);
    }
}
?>