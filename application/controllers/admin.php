<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function keHalamanLogin()
    {
        $this->load->view('admin/login');
    }
    public function prosesLogin()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $cek = $this->M_admin->cekLogin($data);

        if ($cek > 0) {
            $sess = array(
                'status' => TRUE,
                'role' => 'admin'
            );

            $this->session->set_userdata($sess);

            redirect(base_url('admin/dasboard'));
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanDasboard()
    {
        if ($this->session->role == TRUE) {
            $this->load->view('admin/dasboard');
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanMember()
    {
        if ($this->session->role == TRUE) {
            $data['member'] = $this->M_admin->getDataMember()->result();
            $this->load->view('admin/member',$data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function tambahMember(){
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
            'alamat' => $this->input->post('alamat', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
            'telp' => $this->input->post('telp', true)
        );
        $this->M_admin->tambahMem($data);
        $this->session->set_flashdata(
            'success', 
            'Berhasil'
        );
        redirect('admin/member');
    }
    public function editMember($id){
        $data['ubah'] = $this->M_admin->getDataUbah($id)->row();
        $this->load->view('admin/ubahMember', $data);
    }
    public function keHalamanAdmin()
    {
        if ($this->session->role == TRUE) {
            $this->load->view('admin/user');
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanTransaksi()
    {
        if ($this->session->role == TRUE) {
            $data['transaksi'] = $this->M_admin->getDataTransaksi()->result();
            $this->load->view('admin/transaksi', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanDetailTransaksi($id)
    {
        if ($this->session->role == TRUE) {
            $data['transaksi'] = $this->M_admin->getDataDetailTransaksi($id)->row();
            $this->load->view('admin/detailTransaksi', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
}
