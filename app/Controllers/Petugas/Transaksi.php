<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    function __construct()
    {
        $this->pelanggan = new PelangganModel();
        $this->produk = new ProdukModel();
        $this->transaksi = new TransaksiModel();

        if (session()->get('role') != "Petugas") {
            echo '<script>
                alert("Access Denied!");
            </script>';
            exit;
        }

    }

    public function index()
    {
        $data = [
            'title' => "Data Transaksi | SIAPSIR - Sistem Aplikasi Kasir ",
            'header' => "Data Transaksi",
            'cardtitle' => "Tabel Transaksi",
            'inputtitle' => "Form Input Data Transaksi",
            'updatetitle' => "Form Update Data Transaksi",
            'deletetitle' => "Delete Data Transaksi",
        ];

        $data['pelanggan'] = $this->pelanggan->getPelanggan()->getResult();
        $data['produk'] = $this->produk->getProduk()->getResult();

        $data['transaksi'] = $this->transaksi->getTransaksiByAllId()->getResult();
        $data['transaksicount'] = $this->transaksi->countAll();

        $data['page'] = view('petugas/v_transaksi', $data);

        echo view("petugas/v_homepage", $data);
    }

    public function save(){
        $data = array(
            'id_user' => session()->get('id_user'),
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_produk' => $this->request->getPost('id_produk'),
            'jumlah_produk' => $this->request->getPost('jumlah_produk'),

        );

        $data['total_harga'] = $this->transaksi->hitungTotalHarga($data['id_produk'], $data['jumlah_produk']);

        $this->transaksi->saveTransaksi($data);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'New Data Transaksi was Saved!');
    }

    public function update(){
        $id = $this->request->getPost('id_transaksi');
        $data = array(
            'id_user' => session()->get('id_user'),
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_produk' => $this->request->getPost('id_produk'),
            'jumlah_produk' => $this->request->getPost('jumlah_produk'),

        );

        $data['total_harga'] = $this->transaksi->hitungTotalHarga($data['id_produk'], $data['jumlah_produk']);

        $this->transaksi->updateTransaksi($data, $id);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'Data Transaksi was Updated !');
    }

    public function delete(){
        $id = $this->request->getPost('id_transaksi');

        $this->transaksi->deleteTransaksi($id);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'Data Transaksi was Deleted !');
    }

}
