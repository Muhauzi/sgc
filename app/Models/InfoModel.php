<?php
namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model {
    protected $table = 'informasi';
    protected $primaryKey = 'id_informasi';
    protected $allowedFields = ['judul', 'isi', 'foto', 'penulis', 'tanggal'];
    protected $validationRules = [
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
    ];
    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul harus diisi.'
        ],
        'isi' => [
            'required' => 'Isi informasi harus diisi.'
        ],
        'penulis' => [
            'required' => 'Penulis harus diisi.'
        ],
    ];

    public function getInfo($id = false) {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id_informasi' => $id])->first();
    }

    public function saveInfo($judul, $isi, $foto, $penulis, $tanggal) {
        $data = [
            'judul' => $judul,
            'isi' => $isi,
            'foto' => $foto,
            'penulis' => $penulis,
            'tanggal' => $tanggal
        ];

        return $this->insert($data);
    }

    public function updateInfo($idInfo, $judul, $isi, $foto, $penulis, $tanggal) {
        $data = [
            'judul' => $judul,
            'isi' => $isi,
            'foto' => $foto,
            'penulis' => $penulis,
            'tanggal' => $tanggal
        ];

        return $this->update($idInfo, $data);
    }

    public function checkInfo($idInfo) {
        return $this->where(['id_informasi' => $idInfo])->first();
    }

    public function deleteInfo($id) {
        return $this->delete($id);
    }






}


?>