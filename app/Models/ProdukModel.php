<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table           = 'produk';
    protected $primaryKey      = 'id_produk';
    protected $allowedFields   = [
        "nama_produk",
        "harga",
        "stok"
    ];

    public function getHargaById($produkId){
        $query = $this->db->table($this->table)
        ->select('harga')
        ->where('id_produk', $produkId)
        ->get();

        return $query->getRow()->harga;
    }

    public function saveProduk($data){
        $query = $this->db->table('produk')->insert($data);
        return $query;
    }

    public function getProduk(){
        $builder = $this->db->table('produk');
        return $builder->get();
    }
    public function updateProduk($data, $id){
        $query = $this->db->table('produk')->update($data, array('id_produk' => $id));
        return $query;
    }
    public function deleteProduk($id){
        $query = $this->db->table('produk')->delete(array('id_produk' => $id));
        return $query;
    }
}
