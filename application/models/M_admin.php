<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_admin extends CI_Model
{
   public function cekLogin($data)
   {
      return $this->db->get_where('tb_user', $data)->num_rows();
   }
   public function getDataMember()
    {
        return $this->db->get('tb_member');
    }
    public function getDataTransaksi()
    {
        $this->db->select('tb_transaksi.*, tb_member.nama AS NAMA_MEMBER, tb_user.nama AS NAMA_USER, tb_detail_transaksi.*, tb_paket.*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id');
        $this->db->join('tb_user', 'tb_transaksi.id_user = tb_user.id');
        $this->db->join('tb_detail_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left');
        $this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id', 'left');
        return $this->db->get();
    }
    public function tambahMem($data = null){
        $this->db->insert('tb_member', $data);
    }
    public function getDataUbah($id){
        $data = array(
            'id' => $id
        );
        return $this->db->get_where('tb_member', $data);
    }
}
