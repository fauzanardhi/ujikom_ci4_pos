<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    function __construct()
    {
        $this->pelanggan = new PelangganModel();
        $this->produk = new ProdukModel();
        $this->transaksi = new TransaksiModel();
        $this->user = new UserModel();
        
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
            'title' => "Admin Dashboard | SIAPSIR - Sistem Aplikasi Kasir",
            'header' => "Dashboard",
        ];

        $data['pelanggancount'] = $this->pelanggan->countAll();
        $data['produkcount'] = $this->produk->countAll();
        $data['transaksicount'] = $this->transaksi->countAll();
        $data['usercount'] = $this->user->countAll();

        $data['page'] = view('admin/v_dashboard', $data);

        echo view("admin/v_homepage", $data);
    }
}
