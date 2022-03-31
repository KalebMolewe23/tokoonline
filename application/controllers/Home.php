<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_daerah');
    }

    public function index(){
        $databarang['barang'] = $this->m_daerah->tampilan_data1();
        $databarang['barang2'] = $this->m_daerah->tampilan_data2();

        $data['title'] = 'Dalbo Online';
        $this->load->view('user/templates/header', $data);
        $this->load->view('auth/home', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function produk()
    {
        $databarang['barang'] = $this->m_daerah->tampilan_data()->result();

        $data['title'] = 'Produk';
        $this->load->view('user/templates/header', $data);
        $this->load->view('auth/produk', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function detail_produk($id_barang)
    {
        $databarang['barangs'] = $this->m_daerah->tampilan_data1();
        $databarang['barang'] = $this->m_daerah->detail_brg($id_barang);

        $data['title'] = 'Detail Produk';
        $this->load->view('user/templates/header', $data);
        $this->load->view('auth/dataproduk', $databarang);
        $this->load->view('user/templates/footer');
    }

}