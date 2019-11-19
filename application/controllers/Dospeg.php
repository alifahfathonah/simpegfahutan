<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dospeg extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dospeg_model');
    } 

    /*
     * Listing of dospeg
     */
    function index()
    {
        $data['dosen'] = $this->Dospeg_model->get_all_dosen();
        $data['pegawai'] = $this->Dospeg_model->get_all_pegawai();
        $data['_view'] = 'dospeg/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new dospeg
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nip','Nip','numeric');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'jk' => $this->input->post('jk'),
				'golongan' => $this->input->post('golongan'),
				'jenis_pd' => $this->input->post('jenis_pd'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'nip' => $this->input->post('nip'),
				'nidn' => $this->input->post('nidn'),
				'gol_tmt' => $this->input->post('gol_tmt'),
				'jabatan' => $this->input->post('jabatan'),
				'jabatan_tmt' => $this->input->post('jabatan_tmt'),
				'masa_kerja_tahun' => $this->input->post('masa_kerja_tahun'),
				'masa_kerja_bulan' => $this->input->post('masa_kerja_bulan'),
				'pendidikan' => $this->input->post('pendidikan'),
				'tahun_lulus' => $this->input->post('tahun_lulus'),
				'tingkat_ijazah' => $this->input->post('tingkat_ijazah'),
				'usia' => $this->input->post('usia'),
				'userid' => $this->input->post('userid'),
				'catatan_mutasi' => $this->input->post('catatan_mutasi'),
            );
            
            $dospeg_id = $this->Dospeg_model->add_dospeg($params);
            redirect('dospeg/index');
        }
        else
        {            
            $data['_view'] = 'dospeg/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a dospeg
     */
    function edit($id)
    {   
        // check if the dospeg exists before trying to edit it
        $data['dospeg'] = $this->Dospeg_model->get_dospeg($id);
        
        if(isset($data['dospeg']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nip','Nip','numeric');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'jk' => $this->input->post('jk'),
					'golongan' => $this->input->post('golongan'),
					'jenis_pd' => $this->input->post('jenis_pd'),
					'nama' => $this->input->post('nama'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'nip' => $this->input->post('nip'),
					'nidn' => $this->input->post('nidn'),
					'gol_tmt' => $this->input->post('gol_tmt'),
					'jabatan' => $this->input->post('jabatan'),
					'jabatan_tmt' => $this->input->post('jabatan_tmt'),
					'masa_kerja_tahun' => $this->input->post('masa_kerja_tahun'),
					'masa_kerja_bulan' => $this->input->post('masa_kerja_bulan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'tahun_lulus' => $this->input->post('tahun_lulus'),
					'tingkat_ijazah' => $this->input->post('tingkat_ijazah'),
					'usia' => $this->input->post('usia'),
					'userid' => $this->input->post('userid'),
					'catatan_mutasi' => $this->input->post('catatan_mutasi'),
                );

                $this->Dospeg_model->update_dospeg($id,$params);            
                redirect('dospeg/index');
            }
            else
            {
                $data['_view'] = 'dospeg/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The dospeg you are trying to edit does not exist.');
    } 

    /*
     * Deleting dospeg
     */
    function remove($id)
    {
        $dospeg = $this->Dospeg_model->get_dospeg($id);

        // check if the dospeg exists before trying to delete it
        if(isset($dospeg['id']))
        {
            $this->Dospeg_model->delete_dospeg($id);
            redirect('dospeg/index');
        }
        else
            show_error('The dospeg you are trying to delete does not exist.');
    }
    
}