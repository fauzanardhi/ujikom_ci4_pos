<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table           = 'user';
    protected $primaryKey      = 'id_user';
    protected $allowedFields   = [
        "nama",
        "username",
        "password",
        "role"
    ];

    public function cek_login($table, $data){
        $db = db_connect();

        $data = $db->query("SELECT * FROM user where username='$data[username]' AND password='$data[password]' ");
        return $data;
    }

    
    public function saveUser($data){
        $query = $this->db->table('user')->insert($data);
        return $query;
    }
    public function getUser(){
        $builder = $this->db->table('user');
        return $builder->get();
    }
    public function updateUser($data, $id){
        $query = $this->db->table('user')->update($data, array('id_user' => $id));
        return $query;
    }
    public function deleteUser($id){
        $query = $this->db->table('user')->delete(array('id_user' => $id));
        return $query;
    }
    
}
