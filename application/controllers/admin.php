<?php
defined('BASEPATH') or exit('No direct script access allowed');
class admin extends CI_Controller
{
    public function keHalamanLogin()
    {
        $this->load->view('admin/login');
    }
    public function login()
    {
        // $data = array(
        //     'username' => $this->input->post('username'),
        //     'password' => $this->input->post('password')
        // );

        // $cek = $this->m_admin->cekLogin($data);

        // if ($cek > 0 ){
        //     $sess = array(
        //         'status' => TRUE,
        //         'role' => 'admin'
        //     );

        //     $this->session->set_userdata($sess);

        //     redirect(base_url('admin/dasboard'));
        // }
        // else {
        //         redirect(base_url());
            
        // }
        $this->load->view('admin/dasboard');
    }
    public function keHalamanDasboard()
    {
        if ($this->session->role == TRUE){
            $data['tb_transaksi'] = $this->M_admin->getDatatransaksi()->result();
            $this->load->view('admin/dasboard',$data);
        }
        else{
            redirect(base_url());
        }
    }
}
