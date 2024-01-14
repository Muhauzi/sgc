<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TokoModel;
use App\Models\ProdukModel;
use CodeIgniter\Shield\Models\UserModel;

class Toko extends BaseController
{
    private $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        if (!auth()->user()->can('profile.view')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }

        // if user doesn't have id_toko


        $toko = new TokoModel();
        $user = auth()->user();
        $iduser = $user->id;
        if ($toko->checkToko($iduser) == false) {
            return redirect()->to('dashboard')->with('error', 'Anda Belum Memiliki Toko, silahkan hubungi admin untuk membuatkan toko');
        }
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
        if (!auth()->user()->can('toko.editprofile')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }




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
            'validation' => $this->validation
        ];
        return view('toko/edit_profile', $data);
    }

    public function updateProfile()
    {

        if (!auth()->user()->can('toko.editprofile')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
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

        if (!user_id() == $idU) {
            return redirect()->back()->with('error', 'Tidak DApat Menyimpan Perubahan Profile');
        }

        $tokoModel = new TokoModel();
        $tokoModel->updateToko($id, $namaToko, $alamatToko, $deskripsiToko, $fotoToko, $nohpToko, $idUser);

        session()->setFlashdata('success', 'Profile Toko Berhasil Diperbarui');
        return redirect()->to('/toko');
    }

    public function listProduk()
    {
        if (!auth()->user()->can('produk.view')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $produk = new ProdukModel();
        $user = auth()->user();
        $toko = new TokoModel();
        $toko = $toko->getTokoByUserId($user->id);

        if ($toko == null) {
            return redirect()->to('dashboard')->with('error', 'Anda Belum Memiliki Toko, silahkan hubungi admin untuk membuatkan toko');
        }

        $idToko = $toko['id_toko'];
        $produk = $produk->getProdukByTokoId($idToko);
        $data = [
            'title' => 'Produk | SGCommunity',
            'produk' => $produk,
            'user' => $user
        ];
        return view('toko/produk/list_produk', $data);
    }

    public function ubahProduk($id)
    {
        if (!auth()->user()->can('produk.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }


        $produk = new ProdukModel();
        $user = auth()->user();
        $toko = new TokoModel();
        $toko = $toko->getTokoByUserId($user->id);
        $idToko = $toko['id_toko'];
        $produk = $produk->getProduk($id);
        $data = [
            'title' => 'Ubah Produk | SGCommunity',
            'produk' => $produk,
            'user' => $user,
            'validation' => $this->validation
        ];
        return view('toko/produk/edit_produk', $data);
    }


    public function editProduk()
    {

        if (!auth()->user()->can('produk.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }

        $produk = new ProdukModel();
        $user = auth()->user();
        $toko = new TokoModel();
        $toko = $toko->getTokoByUserId($user->id);
        $idToko = $toko['id_toko'];
        $id = $this->request->getVar('id_produk');
        $produk = $produk->getProduk($id);
        $namaProduk = $this->request->getVar('nama_produk');
        $harga_produk = $this->request->getVar('harga_produk');
        $stok_produk = $this->request->getVar('stok_produk');
        $deskripsi_Produk = $this->request->getVar('deskripsi_produk');
        $tersedia = $this->request->getVar('tersedia');

        $file = $this->request->getFile('foto_produk');
        $randomNumber = rand(0, 16777215);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $randomNumber = rand(0, 16777215);
            $newName = dechex($randomNumber) . '.' . $file->getExtension();
            $foto_produk = 'produk-' . $newName;
            $file->move('./img/produk/', $foto_produk);
        } else {
            $foto_produk = $produk['foto_produk'];
        }

        $produkModel = new ProdukModel(); // Create an instance of the ProdukModel class
        $produkModel->updateProduk($id, $namaProduk, $foto_produk, $deskripsi_Produk, $harga_produk, $stok_produk, $tersedia, $idToko); // Call the updateProduk() method on the $produkModel instance



        session()->setFlashdata('success', 'Produk Berhasil Diubah');
        return redirect()->to('/toko/listProduk');

    }

    public function tambahProduk()
    {
        if (!auth()->user()->can('produk.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $data = [
            'title' => 'Tambah Produk | SGCommunity'
        ];
        return view('toko/produk/tambah_produk', $data);
    }

    public function simpanProduk()
    {
        if (!auth()->user()->can('produk.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }

        $this->validation->setRules([
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|numeric',
            'deskripsi_produk' => 'required',
            'foto_produk' => [
                'max_size[foto_produk,1024]',
                'is_image[foto_produk]',
            ]
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', 'Field tidak boleh kosong');
        }

        $produk = new ProdukModel();
        $user = auth()->user();
        $toko = new TokoModel();
        $toko = $toko->getTokoByUserId($user->id);
        $idToko = $toko['id_toko'];
        $namaProduk = $this->request->getVar('nama_produk');
        $hargaProduk = $this->request->getVar('harga_produk');
        $stokProduk = $this->request->getVar('stok_produk');
        $deskripsiProduk = $this->request->getVar('deskripsi_produk');
        $file = $this->request->getFile('foto_produk');
        $randomNumber = rand(0, 16777215);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $randomNumber = rand(0, 16777215);
            $newName = dechex($randomNumber) . '.' . $file->getExtension();
            $fotoProduk = 'produk-' . $newName;
            $file->move('./img/produk/', $fotoProduk);
        } else {
            $fotoProduk = 'default.png';
        }

        $produk->save([
            'nama_produk' => $namaProduk,
            'harga_produk' => $hargaProduk,
            'stok_produk' => $stokProduk,
            'deskripsi_produk' => $deskripsiProduk,
            'foto_produk' => $fotoProduk,
            'id_toko' => $idToko,
            'tersedia' => 1
        ]);

        session()->setFlashdata('success', 'Produk Berhasil Ditambahkan');
        return redirect()->to('/toko/listProduk');
    }

    public function hapusProduk($id)
    {
        if (!auth()->user()->can('produk.delete')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $produk = new ProdukModel();
        $produk->delete($id);
        session()->setFlashdata('success', 'Produk Berhasil Dihapus');
        return redirect()->to('/toko/listProduk');
    }

    public function detailProduk($id)
    {
        if (!auth()->user()->can('produk.view')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $produk = new ProdukModel();
        $produk = $produk->getProdukWithFullnameById($id);
        $data = [
            'title' => 'Detail Produk | SGCommunity',
            'produk' => $produk
        ];
        return view('toko/produk/detail_produk', $data);
    }

}
