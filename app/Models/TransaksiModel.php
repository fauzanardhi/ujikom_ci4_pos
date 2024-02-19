<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProdukModel;

class TransaksiModel extends Model
{
    protected $table           = 'transaksi';
    protected $primaryKey      = 'id_transaksi';
    protected $allowedFields   = [
        "id_user",
        "tgl_transaksi",
        "id_pelanggan",
        "id_produk",
        "jumlah_produk",
        "total_harga"
    ];

    public function hitungTotalHarga($produkId, $jumlahProduk){
        $produkModel = new ProdukModel();
        $hargaProduk = $produkModel->getHargaById($produkId);
        return $hargaProduk * $jumlahProduk;
    }

    public function saveTransaksi($data){
        $query = $this->db->table('transaksi')->insert($data);
        return $query;
    }

    public function getTransaksiByAllId(){
        $builder = $this->db->table('transaksi');
        $builder->select('*');
        $builder->join('user', 'user.id_user = transaksi.id_user', 'left');
        $builder->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $builder->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        return $builder->get();
    }

    public function getTransaksi(){
        $builder = $this->db->table('transaksi');
        return $builder->get();
    }
    public function updateTransaksi($data, $id){
        $query = $this->db->table('transaksi')->update($data, array('id_transaksi' => $id));
        return $query;
    }
    public function deleteTransaksi($id){
        $query = $this->db->table('transaksi')->delete(array('id_transaksi' => $id));
        return $query;
    }

}
