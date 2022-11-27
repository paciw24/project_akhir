<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Controller
{
    public function index(){
        $this->load->view('index');
    }

    // Login
    public function keHalamanLogin()
    {
        $this->load->view('member/login');
    }
    public function prosesLogin()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $user = $this->M_admin->cekLogin(['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama']
                ];
                $this->session->set_userdata($data);
                redirect('admin/dasboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Username Tidak Ditemukan !</div>');
            redirect(base_url('login'));
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
}