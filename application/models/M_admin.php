<?php
   defined('BASEPATH') or exit('No direct script access allowed');
   class m_admin extends CI_Model{
      public function cekLogin($data){
         return $this->db->get_where('tb_user', $data)->num_rows();
      }
   }
?>