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
                    'id' => $user['id_member'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'alamat' => $user['alamat'],
                    'telp' => $user['telp']
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
        redirect(base_url('member/login'));
    }
    // Registrasi
    public function registrasi()
    {
        if ($this->session->username == TRUE) {
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
    public function keHalamanDashboard()
    {
        if ($this->session->username == TRUE) {
            $this->load->view('member/dashboard');
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanLayanan()
    {
        if ($this->session->username == TRUE) {
            $data['layanan'] = $this->M_member->getDatalayanan()->result();
            $this->load->view('member/layanan', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function tambahKeranjang($id)
    {
        $pesanan = $this->M_member->find($id);

        $data = array(
            'id' => $pesanan->id_paket,
            'qty' => 1,
            'price' => $pesanan->harga,
            'name' => $pesanan->nama_paket,
            'image' => $pesanan->gambar

        );

        $this->cart->insert($data);
        redirect('member/layanan');
    }
    public function hapusKeranjang()
    {
        $this->cart->destroy();
        redirect('member/layanan');
    }
    public function keHalamanCheckout()
    {
        if ($this->session->username == TRUE) {
            $cek = $this->M_member->getData()->num_rows() + 1;
            $data['kode_invoice'] = 'P00' . $cek;
            $this->load->view('member/checkout', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function prosesPembayaran()
    {
        $invoice = $this->input->post('invoice');
        $total = $this->cart->total();
        $pengiriman = $this->input->post('pengiriman');
        $is_processed = $this->M_member->pembayaran();
        if ($is_processed) {
            $this->session->set_flashdata('invoice', $invoice);
            $this->session->set_flashdata('total', $total);
            $this->session->set_flashdata('pengiriman', $pengiriman);
            $this->cart->destroy();
            redirect(base_url('member/layanan/invoice'));
        } else {
            echo "Maaf Pesanan Anda Gagal diProses";
        }
    }
    public function prosesBukti()
    {
        $config['upload_path']          = './assets/bukti/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = '3000';
        $config['max_width']            = '3000';
        $config['max_height']           = '3000';
        $config['file_name']            = 'bukti' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $gambar = $image['file_name'];
            $data = array(
                'dibayar' => 'dibayar',
                'bukti' => $gambar
            );
            $this->M_member->bukti($data, ['kode_invoice' => $this->input->post('id')]);
            redirect('member/layanan');
        } else {
            echo 'eror';
        }
    }
    public function prosesBuktiPemesanan()
    {
        $config['upload_path']          = './assets/bukti/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = '3000';
        $config['max_width']            = '3000';
        $config['max_height']           = '3000';
        $config['file_name']            = 'bukti' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $gambar = $image['file_name'];
            $data = array(
                'verifikasi_pembayaran' => null,
                'dibayar' => 'dibayar',
                'bukti' => $gambar
            );
            $this->M_member->bukti($data, ['kode_invoice' => $this->input->post('id')]);
            redirect('member/pesanan');
        } else {
            echo 'eror';
        }
    }
    public function keHalamanInvoice()
    {
        if ($this->session->username == TRUE) {
            $this->load->view('member/invoice');
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamanPesanan()
    {
        if ($this->session->username == TRUE) {
            $id = $this->session->userdata('id');
            // load library
            $this->load->library('pagination');
            
            $config['base_url'] = 'http://localhost/Laundry-app/member/keHalamanPesanan/';
            $config['total_rows'] = $this->M_member->countAllPesanan($id);
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 10;
            
            // initialize
            $this->pagination->initialize($config);
            
            $data['start'] = $this->uri->segment(3);
            $data['pesanan'] = $this->M_member->getDataPesanan($config['per_page'], $data['start'], $id);
            $this->load->view('member/pesanan', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamandetailPesanan($id)
    {
        if ($this->session->username == TRUE) {
            $data['detail'] = $this->M_member->getDataDetails($id)->result();
            $this->load->view('member/detailPesanan', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    public function keHalamandetailPembayaran($id)
    {
        if ($this->session->username == TRUE) {
            $data['pembayaran'] = $this->M_member->getDataPembayaran($id)->row();
            $this->load->view('member/pembayaran', $data);
        } else {
            redirect(base_url('login'));
        }
    }
}
