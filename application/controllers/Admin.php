<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daerah');
        is_logged_in();
    }

    //menampilkan halaman home

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $databarang['barang'] = $this->m_daerah->tampilan_data()->result();

        $data['title'] = 'Home';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/home', $databarang);
        $this->load->view('admin/templates/footer');
    }

    //tampilan menambah barang

    public function barang(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $databarang['barang'] = $this->m_daerah->data_barang()->result();

        $data['title'] = 'Barang';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/barang', $databarang);
        $this->load->view('admin/templates/footer');
    }

    public function editbarang($id){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_barang' => $id);
        $data['title'] = 'Edit Barang';
        $ewilayah['daerah'] = $this->m_daerah->edit_barang($where, 'barang')->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/editbarang', $ewilayah);
        $this->load->view('admin/templates/footer');
    }

    public function edit_barang()
    {
        $id = $this->input->post('id_barang');
        $id_jenis = $this->input->post('id_jenis');
        $nama_barang = $this->input->post('nama_barang');
        $tanggal = $this->input->post('tanggal');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $nilai = $this->input->post('nilai');

        $data = array(
            'id_barang' => $id,
            'id_jenis' => $id_jenis,
            'nama_barang' => $nama_barang,
            'tanggal' => $tanggal,
            'harga' => $harga,
            'stok' => $stok,
            'keterangan' => $keterangan,
            'gambar' => $gambar,
            'nilai' => $nilai,
        );

        $where = array(
            'id_barang' => $id
        );

        $this->m_daerah->update_data($where, $data, 'barang');
        $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Data Berhasil Diupdate...</div>');
        redirect('admin/index');
    }

    //tampilan detail barang

    public function detail($id_barang){

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $datas['barang'] = $this->m_daerah->detail_brg($id_barang);
        $data['title'] = 'Detail Barang';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/detailbarang', $datas);
        $this->load->view('admin/templates/footer');
    }

     //proses menambah barang

    public function tambah_aksi(){ 
        $id_jenis = $this->input->post('id_jenis');
        $nama_barang = $this->input->post('nama_barang');
        $tanggal = $this->input->post('tanggal');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $gambar1 = $_FILES['gambar']['name'];
        if ($gambar1 = '') {
        } else {
            $config['upload_path'] = './assets/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar1 = $this->upload->data('file_name');
            }
        }
        $gambar2 = $_FILES['gambar']['name'];
        if ($gambar2 = '') {
        } else {
            $config['upload_path'] = './assets/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar2 = $this->upload->data('file_name');
            }
        }
        $gambar3 = $_FILES['gambar']['name'];
        if ($gambar3 = '') {
        } else {
            $config['upload_path'] = './assets/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar3 = $this->upload->data('file_name');
            }
        }
        $nilai = $this->input->post('nilai');

        $data = array(

            'id_jenis' => $id_jenis,
            'nama_barang' => $nama_barang,
            'tanggal' => $tanggal,
            'harga' => $harga,
            'stok' => $stok,
            'keterangan' => $keterangan,
            'gambar' => $gambar,
            'gambar1' => $gambar1,
            'gambar2' => $gambar2, 
            'gambar3' => $gambar3,
            'nilai' => $nilai
        );

        $this->m_daerah->tambah_barang($data, 'barang');
        $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Congrat!!! Data Added Successfully.</div>');
        redirect('admin/barang');
    }

    //hapus barang

    public function deletebarang($id)
    {
        $where = array('id_barang' => $id);
        $this->m_daerah->hapus_data($where, 'barang');
        $this->session->set_flashdata('message', '<div class="alert-danger" role="alert">Data Telah Dihapus...</div>');
        redirect('admin/index');
    }

    //tampilan profile user
    function profil(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $dataprofile['profile'] = $this->m_daerah->data_profile();

        $data['title'] = 'My Profil';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/profile', $dataprofile);
        $this->load->view('admin/templates/footer');
    }

    //rampilan  dan proses edit profile
    public function editprofile(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('prov_id', 'prov_id', 'required|trim');
        $this->form_validation->set_rules('city_id', 'city_id', 'required|trim');
        $this->form_validation->set_rules('dis_id', 'dis_id', 'required|trim');
        $this->form_validation->set_rules('subdis_id', 'subdis_id', 'required|trim');
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('contact', 'contact', 'required|trim');
        $this->form_validation->set_rules('gender', 'gender', 'required|trim');
        $this->form_validation->set_rules('address', 'address', 'required|trim');
        $this->form_validation->set_rules('postal_code', 'postal_code', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit My Profile';
            $dataprofile['provinces'] = $this->m_daerah->get_provinces();;
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/editprofile', $dataprofile);
            $this->load->view('admin/templates/footer');
        } else {
            $prov_id = $this->input->post('prov_id');
            $city_id = $this->input->post('city_id');
            $dis_id = $this->input->post('dis_id');
            $subdis_id = $this->input->post('subdis_id');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $contact = $this->input->post('contact');
            $gender = $this->input->post('gender');
            $address = $this->input->post('address');
            $postal_code = $this->input->post('postal_code');
            $image = $_FILES['image']['name'];
            if ($image = '') {
            } else {
                $config['upload_path'] = './assets/user/img';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo "Gambar Gagal Diupload";
                } else {
                    $image = $this->upload->data('file_name');
                }
            }

            $this->db->set('prov_id', $prov_id);
            $this->db->set('city_id', $city_id);
            $this->db->set('dis_id', $dis_id);
            $this->db->set('subdis_id', $subdis_id);
            $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->set('contact', $contact);
            $this->db->set('gender', $gender);
            $this->db->set('address', $address);
            $this->db->set('postal_code', $postal_code);
            $this->db->set('image', $image);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congrate, Your account has been successfully updated. </div>');
            redirect('admin/profil');
        }
    }

    //tampilan dan proses edit password
    function editpassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'current password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'new password', 'required|trim|min_length[5]|matches[new_password2]', [
            'matches' => 'Password 2 is wrong!',
            'min_length' => 'Minimum 5 characters!'
        ]);
        $this->form_validation->set_rules('new_password2', 'password', 'required|trim|matches[new_password1]');

        if($this->form_validation->run() == false){
        $data['title'] = 'Edit Password';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/editpassword');
        $this->load->view('admin/templates/footer');
        }else{ //password pertama salah
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('admin/editpassword');
            }else{ //pesan error password baru jika sama dengan password lama
                if ($current_password == $new_password){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                redirect('admin/editpassword');
                }else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrate, Password has been successfully update!</div>');
                    redirect('admin/profil');
                }
            }
        }
    }

    //memanggil data kota
    public function getdatacities()
    {
        $id_provinces = $this->input->post('prov_name');
        $getdatacit = $this->m_daerah->getdatacit($id_provinces);

        echo json_encode($getdatacit);
    }

    //memanggil data district
    public function getdatadistricts()
    {
        $id_cities = $this->input->post('city_name');
        $getdatadis = $this->m_daerah->getdatadis($id_cities);

        echo json_encode($getdatadis);
    }

    //memanggil data subdistrict
    public function getdatasubdistricts()
    {
        $id_districts = $this->input->post('dis_name');
        $getdatasubdis = $this->m_daerah->getdatasubdis($id_districts);

        echo json_encode($getdatasubdis);
    }

    
}
