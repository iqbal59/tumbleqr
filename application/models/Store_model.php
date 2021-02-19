<?php

 
class Store_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get store by id
     */
    function get_store($id)
    {
        return $this->db->get_where('stores',array('id'=>$id))->row_array();
    }
    

/*
     * Get store by code
     */
    function get_store_by_code($id)
    {
        return $this->db->get_where('stores',array('store_crm_code'=>$id))->row_array();
    }
    

    /*
     * Get all stores count
     */
    function get_all_stores_count()
    {
        $this->db->from('stores');
        return $this->db->count_all_results();
    }
      
    
/*
     * Get all royalties
     */
    function get_store_all_royalties($id)
    {
        $query="SELECT name, code, royality, ifnull(store_royalty, royality) as store_royalty, services.id FROM services left join (SELECT * from royalties WHERE royalties.store_id='$id') as temp on (services.id=temp.service_id)";
        return $this->db->query($query)->result_array();
    }
     


    /*
     * Get all stores
     */
    function get_all_stores()
    {
       return $this->db->query("select store_id, Store_Name from tbl_challan_data group by store_id")
        ->result_array();
        
    }
        
    /*
     * function to add new store
     */
    function add_store($params)
    {
        $this->db->insert('stores',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update store
     */
    function update_store($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('stores',$params);
    }
    
     /*
     * function to update store
     */
    function update_store_royality($id,$params)
    {
       foreach($params['store_royalty'] as $store_royality)
       {
           foreach($store_royality as $key => $royalty){
               if($params['royality'][$id][$key]==$royalty)
               continue;
            echo $query="insert into royalties (service_id, store_id, store_royalty)values('$key', '$id', '$royalty') on duplicate key update store_royalty='$royalty'";
            $this->db->query($query);    
        }
       }
    }
    
    
    
    /*
     * function to delete store
     */
    function delete_store($id)
    {
        return $this->db->delete('stores',array('id'=>$id));
    }
}