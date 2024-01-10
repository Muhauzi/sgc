<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;
use App\Models\TokoModel;

class Toko extends BaseController
{
    public function index()
    {
        $toko = new TokoModel();
        $user = auth()->user();
        $toko = $toko->getTokoByUserId($user->id);
        //if user is not a pedagang 
        if (!$user->inGroup('pedagang')) {
            return redirect()->back()->with('error', 'Anda Bukan Pedagang');
        }
        $idToko = $toko['id_toko'];
        $tokoModel = new TokoModel();
        $owner = $tokoModel->getTokoWithFullnameById($idToko);
        $data = [
            'title' => 'Toko | SGCommunity',
            'toko' => $toko,
            'owner' => $owner,
            'user' => $user
        ];
        return view('toko/profile', $data);
    }

    public function editProfile($id)
    {
        $validation = \Config\Services::validation();

        $toko = new TokoModel();
        $user = auth()->user();
        $toko = $toko->getTokoByUserId($user->id);
        //if user is not a pedagang
        if (!$user->inGroup('pedagang')) {
            return redirect()->back()->with('error', 'Anda Bukan Pedagang');
        }
        $idToko = $toko['id_toko'];
        $tokoModel = new TokoModel();
        $owner = $tokoModel->getTokoWithFullnameById($idToko);
        $data = [
            'title' => 'Edit Profile | SGCommunity',
            'toko' => $toko,
            'owner' => $owner,
            'user' => $user,
            'validation' => $validation
        ];
        return view('toko/edit_profile', $data);
    }

    public function updateProfile()
    {
        
        
        $toko = new TokoModel();
        $idU = $this->request->getVar('user_id');
        $toko = $toko->getTokoByUserId($idU);
        $id = $this->request->getVar('id');
        $namaToko = $this->request->getVar('nama_toko');
        $alamatToko = $this->request->getVar('alamat_toko');
        $deskripsiToko = $this->request->getVar('deskripsi');
        $nohpToko = $this->request->getVar('nohp_toko');
        $idUser = $this->request->getVar('user_id');
        

        // Check if a new image is uploaded
        $file = $this->request->getFile('toko_image');
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $randomNumber = rand(0, 16777215);
            $newName = dechex($randomNumber) . '.' . $file->getExtension();
            $fotoToko = 'toko-' . $newName;
            $file->move('./img/toko/', $fotoToko);

            // Delete previous user_image
            $previousImage = $toko['foto'];
            if ($previousImage && file_exists('./img/toko/' . $previousImage)) {
                unlink('./img/toko/' . $previousImage);
            }
        } else {
            $fotoToko = $toko['foto'];
        }

        $tokoModel = new TokoModel();
        $tokoModel->updateToko($id, $namaToko, $alamatToko, $deskripsiToko, $fotoToko, $nohpToko, $idUser);

        session()->setFlashdata('success', 'Profile Toko Berhasil Diperbarui');
        return redirect()->to('/toko');
    }

    public function editProduk()
    {
        $data = [
            'title' => 'Edit Produk | SGCommunity'
        ];
        return view('toko/edit_produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Produk | SGCommunity'
        ];
        return view('toko/tambah_produk', $data);
    }

    public function hapusProduk()
    {
        $data = [
            'title' => 'Hapus Produk | SGCommunity'
        ];
        return view('toko/hapus_produk', $data);
    }

    public function detailProduk()
    {
        $data = [
            'title' => 'Detail Produk | SGCommunity'
        ];
        return view('toko/detail_produk', $data);
    }

}
