<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    function __construct()
    {
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
            'title' => "Data User | SIAPSIR - Sistem Aplikasi Kasir ",
            'header' => "Data User",
            'cardtitle' => "Tabel User",
            'inputtitle' => "Form Input Data User",
            'updatetitle' => "Form Update Data User",
            'deletetitle' => "Delete Data user",
        ];

        $data['user'] = $this->user->getUser()->getResult();
        $data['usercount'] = $this->user->countAll();

        $data['page'] = view('admin/v_user', $data);

        echo view("admin/v_homepage", $data);
    }

    public function save(){
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        );
        $this->user->saveUser($data);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'New Data User was Saved!');
    }

    public function update(){
        $id = $this->request->getPost('id_user');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        );
        $this->user->updateUser($data, $id);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'Data User was Updated !');
    }
    public function delete(){
        $id = $this->request->getPost('id_user');

        $this->user->deleteUser($id);
        session()->setFlashdata('title','Great!');
        return redirect()->back()
        ->with('text', 'Data User was Deleted !');
    }
    
}

?>