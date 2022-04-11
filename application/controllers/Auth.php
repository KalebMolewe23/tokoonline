<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daerah');
    }

    public function index()
    {
        if ($this->session->userdata('email')) { //fungsi session adalah fungsi untuk menyeleksi setiap user yang melakukan login/register
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); //untuk validasi user yang melakukan login sesuai id yang terdaftar sesuai email
        $this->form_validation->set_rules('password', 'Password', 'trim|required'); //untuk validasi user yang melakukan login sesuai id yang terdaftar sesuai password
        if ($this->form_validation->run() == false) { //jika data salah maka akan terarah ke login/tampilan login
            $data['title'] = 'Form Login';
            $this->load->view('auth/template/login/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/template/login/footer');
        } else {
            $this->_login(); //variabel jika data login benar
        }
    }

    private function _login()
    { // validasi misalkan login benar/data saat login benar
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) { // 2 adalah user customer penjual ataupun pembeli
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 2) { //jika role id 1 yang terpanggil maka tampilan admin yang akan ditampilkan
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else { //misal data tidak sesuai ketika login maupun registrasi
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!!! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Tidak Aktif!!! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Tidak Ada!!! </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This Number Already Exists!!!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email Already Exists!!!'
        ]);
        $this->form_validation->set_rules('contact', 'contact', 'required|trim|is_unique[user.contact]', [
            'is_unique' => 'This Contact Already Exists!!!'
        ]);
        $this->form_validation->set_rules('gender', 'gender', 'required|trim');
        $this->form_validation->set_rules('address', 'address', 'required|trim');
        $this->form_validation->set_rules('postal_code', 'postal_code', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password ke2 is wrong!',
            'min_length' => 'Minimum 5 characters!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Registrasi';
            $x['provinces'] = $this->m_daerah->get_provinces();
            $this->load->view('auth/template/register/header', $data);
            $this->load->view('auth/register', $x);
            $this->load->view('auth/template/register/footer');
        } else {
            $email = $this->input->post('email', true);
            $datauser = [
                'prov_id' => $this->input->post('prov_id'),
                'city_id' => $this->input->post('city_id'),
                'dis_id' => $this->input->post('dis_id'),
                'subdis_id' => $this->input->post('subdis_id'),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'contact' => htmlspecialchars($this->input->post('contact', true)),
                'gender' => htmlspecialchars($this->input->post('gender', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'postal_code' => htmlspecialchars($this->input->post('postal_code', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpeg',
                'role_id' => 3,
                'is_active' => 0,
                'date_created' => time()
            ];

            //nilai token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $datauser);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert-success" role="alert">SUCCEED!!! Akun Berhasil Dibuat. Silahkan Validasi Akun Anda Melalui Email Anda.</div>');
            redirect('auth');
        }
    }

    //memanggil API Mailtrap
    private function _sendEmail($token, $type){
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '6e030f2015fcb2',
            'smtp_pass' => 'e7f27e614b9b15',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        );

        $this->email->initialize($config);

        $this->email->from('fepdeveloper@gmail.com', 'F.E.P Developer Team');
        $this->email->to($this->input->post('email'));

        if($type == 'verify'){
            $this->email->subject('Verifikasi Akun Anda');
            $this->email->message('Silahkan klik link ini untuk melakukan verifikasi terhadap akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '"><button>Active</button></a>');
        }

        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token){
                if(time() - $user_token['date_created'] < (60*60*24)){   
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .' has been activated! Silahkan Login</div>');
                    redirect('auth');
                }else{
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Anda Gagal! Token Expired</div>');
                    redirect('auth'); 
                }

            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Anda Gagal! Token Salah</div>');
                redirect('auth');
            }

        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Anda Gagal! Email Salah</div>');
            redirect('auth');
        }
    }

    public function getdatacities(){
        $id_provinces = $this->input->post('prov_name');
        $getdatacit = $this->m_daerah->getdatacit($id_provinces);

        echo json_encode($getdatacit);
    }

    public function getdatadistricts()
    {
        $id_cities = $this->input->post('city_name');
        $getdatadis = $this->m_daerah->getdatadis($id_cities);

        echo json_encode($getdatadis);
    }

    public function getdatasubdistricts()
    {
        $id_districts = $this->input->post('dis_name');
        $getdatasubdis = $this->m_daerah->getdatasubdis($id_districts);

        echo json_encode($getdatasubdis);
    }

    public function logout()
    { //fungsi untuk logout
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil LogOut</div>');
        redirect('auth');
    }

    public function blocked(){
        echo 'access blocked';
    }
}
