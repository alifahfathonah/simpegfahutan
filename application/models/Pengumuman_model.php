<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pengumuman_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pengumuman by id
     */
    function get_pengumuman($id)
    {
        return $this->db->get_where('pengumuman',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all pengumuman count
     */
    function get_all_pengumuman_count()
    {
        $this->db->from('pengumuman');
        $this->db->order_by("datetime", "desc");
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pengumuman
     */
    function get_all_pengumuman($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pengumuman')->result_array();
    }
        
    /*
     * function to add new pengumuman
     */
    function add_pengumuman($params)
    {
        $this->db->insert('pengumuman',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pengumuman
     */
    function update_pengumuman($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('pengumuman',$params);
    }
    
    /*
     * function to delete pengumuman
     */
    function delete_pengumuman($id)
    {
        return $this->db->delete('pengumuman',array('id'=>$id));
    }
}