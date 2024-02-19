<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{

    function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        return view('v_login_auth');
    }
    public function register()
    {
        return view('v_register');

    }
    public function save(){
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        );
        $this->user->saveUser($data);
        session()->setFlashdata('great','Berhasil register, silahkan login');
        return redirect()->to('auth');
    }
    public function login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $where = array(
            'username' => $username,
            'password' => $password
        );

        $auth = $this->user->cek_login("admin", $where);
        $logged_in_adm = $auth->getFirstRow();

        if ($logged_in_adm != null) {
            $username = $this->request->getVar('username');
            $user = $this->user->where('username', $username)->first();
            $this->setUserSession($user);

            if ($user['role'] == "Admin") {
                return redirect()->to(base_url('admin/dashboard'));
            }elseif ($user['role'] == "Petugas"){
                return redirect()->to(base_url('petugas/dashboard'));
            }

        }else{
            session()->setFlashdata('wrong', "Username atau password ada yang salah");
            return redirect()->to('auth');
        }
    }

    private function setUserSession($user){
        $data = [
            'id_user' => $user['id_user'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'password' => $user['password'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('auth');
    }

    public function saveRegister(){

    }

    
}
