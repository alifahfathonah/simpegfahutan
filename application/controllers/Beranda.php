<?php
class Beranda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $dospegjumlah = $this->db->query("SELECT DISTINCT d.jenis_pd,(SELECT COUNT(id) FROM dospeg WHERE jenis_pd=d.jenis_pd) AS jumlah FROM dospeg d")->result_array();
        $dospegpangkat = $this->db->query("SELECT DISTINCT d.golongan,(SELECT count(golongan) FROM dospeg WHERE golongan=d.golongan) as jumlah FROM dospeg d")->result_array();
        $pengumuman = $this->db->query("SELECT * FROM pengumuman ORDER BY datetime DESC LIMIT 4")->result_array();
        $pengumumannext = $this->db->query("SELECT * FROM pengumuman ORDER BY datetime DESC LIMIT 4,18446744073709551615")->result_array();
        $data['pengumuman'] = $pengumuman;
        $data['pengumumannext'] = $pengumumannext;
        $data['dospegjumlah'] = $dospegjumlah;
        $data['dospegpangkat'] = $dospegpangkat;
        $data['_view'] = 'beranda';
        $this->load->view('layouts/main',$data);
    }
}
