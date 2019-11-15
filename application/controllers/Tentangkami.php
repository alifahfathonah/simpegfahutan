<?php
class Tentangkami extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['jabatan_struktural'] = $this->db->query("SELECT d.nama, d.nip, d.golongan, j.jabatan_struktural FROM jabatan_struktural j JOIN dospeg d ON d.nip=j.nip ORDER BY j.id")->result_array();
        $data['_view'] = 'tentangkami';
        $this->load->view('layouts/main',$data);
    }
}
