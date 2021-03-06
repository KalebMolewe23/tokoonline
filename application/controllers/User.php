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

        $databarang['barang'] = $this->m_daerah->tampilan_data1();
        $databarang['barang2'] = $this->m_daerah->tampilan_data2();
        
        $data['title'] = 'Home';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function produk(){
        //load library
        $this->load->library('pagination');
        $config['base_url']     = 'http://localhost/dalboonline/user/produk';
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
        $this->load->view('user/produk', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function hoodie()
    {
        //load library
        $this->load->library('pagination');
        $config['base_url']     = 'http://localhost/dalboonline/user/hoodie';
        $config['total_rows']   = $this->m_daerah->countHoodie();
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
        $databarang['barang'] = $this->m_daerah->tampilan_data_hoodie($config['per_page'], $datap['start']);

        $data['title'] = 'Hoodie';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produkhoodie', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function crewneck()
    {
        //load library
        $this->load->library('pagination');
        $config['base_url']     = 'http://localhost/dalboonline/user/crewneck';
        $config['total_rows']   = $this->m_daerah->countHoodie();
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
        $databarang['barang'] = $this->m_daerah->tampilan_data_crewneck($config['per_page'], $datap['start']);

        $data['title'] = 'Hoodie';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produkcrewneck', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function detail_produk($id_barang)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $databarang['barangs'] = $this->m_daerah->tampilan_data1();
        $databarang['barang'] = $this->m_daerah->detail_brg($id_barang);

        $data['title'] = 'Detail Produk';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/dataproduk', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function tambah_keranjang($id){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $barang = $this->m_daerah->find($id);

        $datatambah = array(
            'id'    =>  $barang->id_barang,
            'image' =>  $barang->gambar,
            'qty'   =>  1,
            'price' =>  $barang->harga,
            'name'  =>  $barang->nama_barang
        );
        $this->cart->insert($datatambah);
        redirect('user/produk');
    }

    public function detail_keranjang(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $databarang['barangs'] = $this->m_daerah->tampilan_data1();

        $data['title'] = 'Detail Produk';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/keranjang', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function checkout(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $databarang['barangs'] = $this->m_daerah->tampilan_data1();

        $data['title'] = 'Detail Produk';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/checkout', $databarang);
        $this->load->view('user/templates/footer');
    }

    public function search()
    {
        //load library
        $this->load->library('pagination');
        $config['base_url']     = 'http://localhost/dalboonline/user/search';
        $config['total_rows']   = $this->m_daerah->countHoodie();
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
        $data['barang'] = $this->m_daerah->tampilan_data_produk($config['per_page'], $datap['start']);

        $this->load->model('m_daerah');
        $keyword = $this->input->get('keyword');
        $data = $this->m_daerah->search($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data
        );

        $datas['title'] = 'Search Product';
        $this->load->view('user/templates/header', $datas);
        $this->load->view('user/search', $data);
        $this->load->view('user/templates/footer');
    }

}