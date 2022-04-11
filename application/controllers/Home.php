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
        //load library
        $this->load->library('pagination');
        $config['base_url']     = 'http://localhost/dalboonline/home/produk';
        $config['total_rows']   = $this->m_daerah->countProduct();
        $config['per_page'] = 8;
        
        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'first';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $datap['start'] = $this->uri->segment(3);
        $databarang['barang'] = $this->m_daerah->tampilan_data_produk($config['per_page'], $datap['start']);

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