<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Controller
{
    public function index()
    {
        $this->load->view('index');
    }

    // Login
    public function keHalamanLogin()
    {
        if ($this->session->username == TRUE) {
            redirect(base_url('member/dashboard'));
        } else {
            $this->load->view('member/login');
        }
    }
    public function prosesLogin()
    {
        $username = $this->input->post('usernameLogin', true);
        $password = $this->input->post('passwordLogin', true);

        $user = $this->M_member->cekLogin(['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama']
                ];
                $this->session->set_userdata($data);
                redirect('member/dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" style="width: 380px !important;">Password Salah !</div>');
                redirect('member/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert" style="width: 380px !important;">Username Tidak Ditemukan !</div>');
            redirect(base_url('member/login'));
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
    // Registrasi
    public function registrasi()
    {
        if ($this->session->username == TRUE)  {
            redirect(base_url('member/dashboard'));
        }
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[tb_member.username]', [
            'required' => 'Username belum diiisi!',
            'is_unique' => 'Username Sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[tb_member.email]', [
            'required' => 'Email Harus Diisi!!',
            'valid_email' => 'Email Tidak Benar!!',
            'is_unique' => 'Email Sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => "Password Harus Diisi!",
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('notelp', 'No Telp', 'required|trim|min_length[10]', [
            'required' => "No Telp Harus Diisi!",
            'min_length' => 'No Telp Terlalu Pendek',
            'numeric' => 'Harus Berupa Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat belum diiisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('member/login');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => $this->input->post('nama', true),
                'username' => htmlspecialchars($this->input->post('username'), true),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'telp' => $this->input->post('notelp', true),
                'alamat' => $this->input->post('alamat', true),
            ];
            $this->M_member->SimpanData($data);
            redirect('member/login');
        }
    }
}
