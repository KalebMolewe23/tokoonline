<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_daerah');
        is_logged_in();
    }

    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $databarang['barang'] = $this->m_daerah->tampilan_data()->result();
        
        $data['title'] = 'Home';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home', $databarang);
        $this->load->view('user/templates/footer');
    }



}