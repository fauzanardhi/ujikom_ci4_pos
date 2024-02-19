<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    function __construct()
    {

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
            'title' => "Petugas Dashboard | SIAPSIR - Sistem Aplikasi Kasir",
            'header' => "Dashboard",
        ];

        $data['transaksicount'] = $this->transaksi->countAll();

        $data['page'] = view('petugas/v_dashboard', $data);

        echo view("petugas/v_homepage", $data);
    }
}
