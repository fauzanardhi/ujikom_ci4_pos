<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table           = 'pelanggan';
    protected $primaryKey      = 'id_pelanggan';
    protected $allowedFields   = [
        "nama_pelanggan",
        "alamat_pelanggan",
        "no_tlp"
    ];

    public function savePelanggan($data){
        $query = $this->db->table('pelanggan')->insert($data);
        return $query;
    }

    public function getPelanggan(){
        $builder = $this->db->table('pelanggan');
        return $builder->get();
    }
    public function updatePelanggan($data, $id){
        $query = $this->db->table('pelanggan')->update($data, array('id_pelanggan' => $id));
        return $query;
    }
    public function deletePelanggan($id){
        $query = $this->db->table('pelanggan')->delete(array('id_pelanggan' => $id));
        return $query;
    }
}
