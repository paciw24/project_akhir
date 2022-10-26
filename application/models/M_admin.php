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
}
