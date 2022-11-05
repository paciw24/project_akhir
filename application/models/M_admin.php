<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_admin extends CI_Model
{
    public function cekLogin($data)
    {
        return $this->db->get_where('tb_user', $data);
    }
    // Admin

    // Member
    public function getDataMember()
    {
        return $this->db->get('tb_member');
    }
    public function tambahMem($data = null)
    {
        $this->db->insert('tb_member', $data);
    }
    public function getDataUbah($id)
    {
        $data = array(
            'id_member' => $id
        );
        return $this->db->get_where('tb_member', $data);
    }


    // Paket
    public function getDataPaket()
    {
        return $this->db->get('tb_paket');
    }
    public function tambahPaket($data = null)
    {
        $this->db->insert('tb_paket', $data);
    }
    public function getDataUbahPaket($id)
    {
        $data = array(
            'id_paket' => $id
        );
        return $this->db->get_where('tb_paket', $data);
    }
    public function updatePaket($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tb_paket', $data);
    }
    public function hapusPaket($id)
    {
        $this->db->where('id_paket', $id);
        return $this->db->delete('tb_paket');
    }

    // Transaksi
    public function getDataTransaksi()
    {
        $this->db->select('tb_transaksi.*, tb_member.nama AS NAMA_MEMBER, tb_user.nama AS NAMA_USER');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
        $this->db->join('tb_user', 'tb_transaksi.id_user = tb_user.id_user');
        return $this->db->get();
    }
    public function getDataDetailTransaksi($id)
    {
        $data = array(
            'tb_transaksi.id_transaksi' => $id
        );
        $this->db->select('tb_transaksi.*, tb_member.nama AS NAMA_MEMBER, tb_member.alamat AS ALAMAT, tb_member.telp AS TELP, tb_user.nama AS NAMA_USER, tb_detail_transaksi.*, tb_paket.*, SUM(tb_detail_transaksi.subtotal) AS TOTAL');
        $this->db->from('tb_transaksi');
        $this->db->where($data);
        $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
        $this->db->join('tb_user', 'tb_transaksi.id_user = tb_user.id_user');
        $this->db->join('tb_detail_transaksi', 'tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi');
        $this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket');
        return $this->db->get();
    }
    public function getDataDetails($id)
    {
        $data = array(
            'tb_transaksi.id_transaksi' => $id
        );
        $this->db->select('tb_transaksi.id_transaksi, tb_detail_transaksi.*, tb_paket.*');
        $this->db->from('tb_transaksi');
        $this->db->where($data);
        $this->db->join('tb_detail_transaksi', 'tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi', 'left');
        $this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket');
        return $this->db->get();
    }
    public function updateStat($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tb_transaksi', $data);
    }
    public function updateByr($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tb_transaksi', $data);
    }
}
