<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_member extends CI_Model
{
    public function SimpanData($data = null){
        $this->db->insert('tb_member', $data);
    }
    public function cekLogin($data)
    {
        return $this->db->get_where('tb_member', $data);
    }
    public function getDatalayanan(){
        return $this->db->get('tb_paket');
    }
}
