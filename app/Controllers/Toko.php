<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Toko extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Toko | SGCommunity'
        ];
        return view('toko/product_list', $data);
    }

    public function pesanan()
    {
        $data = [
            'title' => 'Pesanan | SGCommunity'
        ];
        return view('toko/pesanan', $data);
    }
    
    public function editProfile()
    {
        $data = [
            'title' => 'Edit Profile | SGCommunity'
        ];
        return view('toko/edit_profile', $data);
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

    public function editPesanan()
    {
        $data = [
            'title' => 'Edit Pesanan | SGCommunity'
        ];
        return view('toko/edit_pesanan', $data);
    }

    public function tambahPesanan()
    {
        $data = [
            'title' => 'Tambah Pesanan | SGCommunity'
        ];
        return view('toko/tambah_pesanan', $data);
    }

    public function editPengiriman()
    {
        $data = [
            'title' => 'Edit Pengiriman | SGCommunity'
        ];
        return view('toko/edit_pengiriman', $data);
    }

    public function tambahPengiriman()
    {
        $data = [
            'title' => 'Tambah Pengiriman | SGCommunity'
        ];
        return view('toko/tambah_pengiriman', $data);
    }

    public function editPembayaran()
    {
        $data = [
            'title' => 'Edit Pembayaran | SGCommunity'
        ];
        return view('toko/edit_pembayaran', $data);
    }

    public function tambahPembayaran()
    {
        $data = [
            'title' => 'Tambah Pembayaran | SGCommunity'
        ];
        return view('toko/tambah_pembayaran', $data);
    }

    public function editPengembalian()
    {
        $data = [
            'title' => 'Edit Pengembalian | SGCommunity'
        ];
        return view('toko/edit_pengembalian', $data);
    }

    public function tambahPengembalian()
    {
        $data = [
            'title' => 'Tambah Pengembalian | SGCommunity'
        ];
        return view('toko/tambah_pengembalian', $data);
    }

    
    public function editPengajuan()
    {
        $data = [
            'title' => 'Edit Pengajuan | SGCommunity'
        ];
        return view('toko/edit_pengajuan', $data);
    }


}
