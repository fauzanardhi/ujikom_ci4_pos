<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    function __construct()
    {
        $this->produk = new ProdukModel();

        if (session()->get('role') != "Admin") {
            echo '<script>
                alert("Access Denied!");
            </script>';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => "Data Produk | SIAPSIR - Sistem Aplikasi Kasir",
            'header' => "Data Produk",
            'cardtitle' => "Tabel Produk",
            'inputtitle' => "Form Input Data Produk",
            'updatetitle' => "Form Update Data Produk",
            'deletetitle' => "Delete Data Produk",
        ];

        $data['produk'] = $this->produk->getProduk()->getResult();

        $data['produkcount'] = $this->produk->countAll();

        $data['page'] = view('admin/v_produk', $data);

        echo view("admin/v_homepage", $data);
    }

    public function save(){
        $data = array(
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        );
        $this->produk->saveProduk($data);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'New Data Produk was Saved!');
    }

    public function update(){
        $id = $this->request->getPost('id_produk');
        $data = array(
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        );
        $this->produk->updateProduk($data, $id);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'Data Produk was Updated !');
    }

    public function delete(){
        $id = $this->request->getPost('id_produk');

        $this->produk->deleteProduk($id);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'Data Produk was Deleted !');
    }

}
