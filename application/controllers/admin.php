<?php
defined('BASEPATH') or exit('No direct script access allowed');
class admin extends CI_Controller
{
    public function keHalamanLogin()
    {
        $this->load->view('admin/login');
    }
}
