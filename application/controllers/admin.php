<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    // Login
    public function keHalamanLogin()
    {
        $this->load->view('admin/login');
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


    // Dashboard
    public function keHalamanDasboard()
    {
        if ($this->session->username == TRUE) {
            $data['member'] = $this->M_admin->countAllMember();
            $data['admin'] = $this->M_admin->countAllAdmin();
            $data['order'] = $this->M_admin->countAllOrders();
            $data['paket'] = $this->M_admin->countAllPaket();
            $data['total'] = $this->M_admin->sumTotal()->row();
            $data['dayTotal'] = $this->M_admin->sumDayTotal()->row();
            $data['nama'] = $this->M_admin->cekLogin(['nama' => $this->session->userdata('nama')])->row_array();
            $this->load->view('admin/dasboard', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    // Menu Member
    public function keHalamanMember()
    {
        if ($this->session->username == TRUE) {
            // load library
            $this->load->library('pagination');

            // ambil data keyword
            if ($this->input->post('submit')) {
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] = $this->session->userdata('keyword');
            }

            // config
            $this->db->like('nama', $data['keyword']);
            $this->db->from('tb_member');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 5;

            // initialize
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['member'] = $this->M_admin->getDataMember($config['per_page'], $data['start'], $data['keyword']);
            $this->load->view('admin/member', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function tambahMember()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'telp' => $this->input->post('telp', true)
        );
        $this->M_admin->tambahMem($data);
        $this->session->set_flashdata(
            'success',
            'Berhasil'
        );
        redirect('admin/member');
    }
    public function editMember($id)
    {
        if ($this->session->username == TRUE) {
            $data['ubah'] = $this->M_admin->getDataUbah($id)->row();
            $this->load->view('admin/ubahMember', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function ubahMember()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'telp' => $this->input->post('telp', true)
        );
        $this->M_admin->updateMember($data, ['id_member' => $this->input->post('id')]);
        $this->session->set_flashdata('success', 'berhasil');
        redirect(base_url('admin/member'));
    }
    public function hapus_member($id)
    {
        $this->M_admin->hapusMember($id);
        $this->session->set_flashdata(
            'delete',
            'Berhasil'
        );
        redirect(base_url('admin/member'));
    }

    // Menu Admin
    public function keHalamanAdmin()
    {
        if ($this->session->username == TRUE) {
            // load library
            $this->load->library('pagination');

            // ambil data keyword
            if ($this->input->post('submit')) {
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] = $this->session->userdata('keyword');
            }

            // config
            $this->db->like('nama', $data['keyword']);
            $this->db->from('tb_user');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 5;

            // initialize
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['user'] = $this->M_admin->getDataAdmin($config['per_page'], $data['start'], $data['keyword']);
            $this->load->view('admin/admin', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function tambahAdmin()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'email' => $this->input->post('email', true),
            'notelp' => $this->input->post('telp', true)
        );
        $this->M_admin->tambahAdmin($data);
        $this->session->set_flashdata(
            'success',
            'Berhasil'
        );
        redirect('admin/user');
    }
    public function editAdmin($id)
    {
        if ($this->session->username == TRUE) {
            $data['ubah'] = $this->M_admin->getDataUbahAdmin($id)->row();
            $this->load->view('admin/ubahAdmin', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function ubahAdmin()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'email' => $this->input->post('email', true),
            'notelp' => $this->input->post('telp', true)
        );
        $this->M_admin->updateAdmin($data, ['id_user' => $this->input->post('id')]);
        $this->session->set_flashdata('success', 'berhasil');
        redirect(base_url('admin/user'));
    }
    public function hapus_Admin($id)
    {
        $this->M_admin->hapusAdmin($id);
        $this->session->set_flashdata(
            'delete',
            'Berhasil'
        );
        redirect(base_url('admin/user'));
    }

    // Paket
    public function keHalamanPaket()
    {
        if ($this->session->username == TRUE) {
            // load library
            $this->load->library('pagination');

            // ambil data keyword
            if ($this->input->post('submit')) {
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] = $this->session->userdata('keyword');
            }

            // config
            $this->db->like('nama_paket', $data['keyword']);
            $this->db->from('tb_paket');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 5;

            // initialize
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['paket'] = $this->M_admin->getDataPaket($config['per_page'], $data['start'], $data['keyword']);
            $this->load->view('admin/paket', $data);
        } else {
            redirect(base_url('login'));
        }
        $this->form_validation->set_rules('namapaket', 'Nama Paket', 'required', [
            'required' => 'Nama paket belum diisi'
        ]);
    }
    public function tambahPaket()
    {
        $data = array(
            'jenis' => $this->input->post('jenis', true),
            'nama_paket' => $this->input->post('nmpaket', true),
            'harga' => $this->input->post('Harga', true),
        );
        $this->M_admin->tambahpaket($data);
        $this->session->set_flashdata(
            'success',
            'Berhasil'
        );
        redirect('admin/paket');
    }
    public function editPaket($id)
    {
        if ($this->session->username == TRUE) {
            $data['ubah'] = $this->M_admin->getDataUbahPaket($id)->row();
            $this->load->view('admin/ubahPaket', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function ubahPaket()
    {
        $data = array(
            'jenis' => $this->input->post('jenis', true),
            'nama_paket' => $this->input->post('nmpaket', true),
            'harga' => $this->input->post('Harga', true),
        );
        $this->M_admin->updatePaket($data, ['id_paket' => $this->input->post('id')]);
        $this->session->set_flashdata('success', 'berhasil');
        redirect(base_url('admin/paket'));
    }
    public function hapus_paket($id)
    {
        $this->M_admin->hapusPaket($id);
        $this->session->set_flashdata(
            'delete',
            'Berhasil'
        );
        redirect(base_url('admin/paket'));
    }


    // Menu Transaksi
    public function keHalamanTransaksi()
    {
        if ($this->session->username == TRUE) {
            $data['transaksi'] = $this->M_admin->getDataTransaksi()->result();
            $this->load->view('admin/transaksi', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanDetailTransaksi($id)
    {
        if ($this->session->username == TRUE) {
            $data['transaksi'] = $this->M_admin->getDataDetailTransaksi($id)->row();
            $data['detail'] = $this->M_admin->getDataDetails($id)->result();
            $this->load->view('admin/detailTransaksi', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function updateStatus()
    {
        $data = array(
            'status' => $this->input->post('status', true)
        );

        $this->M_admin->updateStat($data, ['id_transaksi' => $this->input->post('id')]);
        $this->session->set_flashdata('success', 'berhasil');
        redirect(base_url('admin/transaksi'));
    }
    public function updateBayar()
    {
        $data = array(
            'dibayar' => $this->input->post('bayar', true)
        );
        $total = $this->input->post('total', true);
        $cash = $this->input->post('cash', true);
        $hasil = $cash - $total;
        $this->M_admin->updateByr($data, ['id_transaksi' => $this->input->post('id')]);
        $this->session->set_flashdata('kembalian', $hasil);
        redirect(base_url('admin/transaksi'));
    }
    public function verifikasiSetuju($id)
    {
        $data = array(
            'verifikasi_pembayaran' => $this->input->post('setuju', true)
        );
        $this->M_admin->updateVerifikasi($data, ['id_transaksi' => $this->input->post('id')]);
        $this->session->set_flashdata('success', 'berhasil');
        redirect(base_url('admin/transaksi'));
    }
    public function verifikasiTolak($id)
    {
        $data = array(
            'verifikasi_pembayaran' => $this->input->post('tolak', true)
        );
        $this->M_admin->updateVerifikasi($data, ['id_transaksi' => $this->input->post('id')]);
        $this->session->set_flashdata('delete', 'berhasil');
        redirect(base_url('admin/transaksi'));
    }
}
