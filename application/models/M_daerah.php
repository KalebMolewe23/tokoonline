<?php
class M_daerah extends CI_Model
{

    function get_provinces()
    {
        $query = $this->db->query("SELECT * FROM provinces ORDER BY prov_name ASC");
        return $query->result();
    }

    function getdatacit($id_provinces)
    {
        $query = $this->db->query("SELECT * FROM cities WHERE prov_id ='$id_provinces' ORDER BY city_name ASC");
        return $query->result();
    }

    function getdatadis($id_cities)
    {
        $query = $this->db->query("SELECT * FROM districts WHERE city_id ='$id_cities' ORDER BY dis_name ASC");
        return $query->result();
    }

    function getdatasubdis($id_districts)
    {
        $query = $this->db->query("SELECT * FROM subdistricts WHERE dis_id ='$id_districts' ORDER BY subdis_name ASC");
        return $query->result();
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function selectdata($where = '')
    {
        return $this->db->query("select * from $where;");
    }

    //menampilkan data barang
    function tampilan_data()
    {
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        return $this->db->get('barang');
    }

    //limit data tampilan produk
    function tampilan_data_produk($limit, $start){
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        return $this->db->get('barang', $limit, $start)->result();
    }

    function tampilan_data_hoodie($limit, $start){
        $this->db->join('jenis_barang','jenis_barang.id_jenis = barang.id_jenis');
        $this->db->where('jenis="Hoodie"');
        return $this->db->get('barang', $limit, $start)->result();
    }

    function tampilan_data_crewneck($limit, $start){
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        $this->db->where('jenis="Crewnect"');
        return $this->db->get('barang', $limit, $start)->result();
    }

    //menampilkan jumlah produk
    public function countProduct(){
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        return $this->db->get('barang')->num_rows();
    }

    //menampilkan jumlah hoodie
    public function countHoodie()
    {
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        $this->db->where('jenis="Hoodie"');
        return $this->db->get('barang')->num_rows();
    }

    //menampilkan data barang hoodie limit 4
    function tampilan_data1()
    {
        $query = $this->db->query("SELECT * FROM barang JOIN jenis_barang on jenis_barang.id_jenis = barang.id_jenis WHERE jenis='hoodie' ORDER BY id_barang DESC LIMIT 4");
        return $query->result();
    }

    //menampilkan data barang crewneck limit 4
    function tampilan_data2()
    {
        $query = $this->db->query("SELECT * FROM barang JOIN jenis_barang on jenis_barang.id_jenis = barang.id_jenis WHERE jenis='crewnect' ORDER BY id_barang DESC LIMIT 4");
        return $query->result();
    }
    

    //memanggil data jenis barang
    function data_barang(){
        return $this->db->get('jenis_barang');
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //menampilkan data profile user

    function data_profile()
    {
        $query = $this->db->query("SELECT * FROM user join (user_role,provinces,cities,districts,subdistricts) on user_role.id = user.role_id 
        and provinces.prov_id = user.prov_id and cities.city_id = user.city_id and districts.dis_id = user.dis_id and subdistricts.subdis_id = user.subdis_id");
        return $query->result();
    }

    //memanggil data barang

    public function detail_brg($id_barang)
    {
        $result = $this->db->where('id_barang', $id_barang)->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    //edit barang

    public function edit_barang($where, $table)
    {
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang.id_jenis');
        return  $this->db->get_where($table, $where);
    }

    //untuk mencari data barang yang akan dimasukan kedalam keranjang
    public function find($id){
        $result = $this->db->where('id_barang', $id)
                            ->limit(1)
                            ->get('barang');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function search($keyword=null)
    {
        $this->db->select('*');
        $this->db->join('jenis_barang','jenis_barang.id_jenis = barang.id_jenis');
        $this->db->from('barang');
        if(!empty($keyword)){
            $this->db->like('nama_barang', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
