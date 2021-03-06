<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dospeg_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get dospeg by id
     */
    function get_dospeg($id)
    {
        return $this->db->get_where('dospeg',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all dospeg
     */
    function get_all_dosen()
    {
        $this->db->where('jenis_pd','dosen');
        $this->db->order_by('golongan', 'desc');
        return $this->db->get('dospeg')->result_array();
    }

    function get_all_pegawai()
    {
        $this->db->where('jenis_pd','pegawai');
        $this->db->order_by('golongan', 'desc');
        return $this->db->get('dospeg')->result_array();
    }
        
    /*
     * function to add new dospeg
     */
    function add_dospeg($params)
    {
        $this->db->insert('dospeg',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update dospeg
     */
    function update_dospeg($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('dospeg',$params);
    }
    
    /*
     * function to delete dospeg
     */
    function delete_dospeg($id)
    {
        return $this->db->delete('dospeg',array('id'=>$id));
    }
}